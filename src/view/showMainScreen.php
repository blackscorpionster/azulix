<?php
namespace src\view;
use helpers\AjaxResponse;
use src\services\AppMessageService;
use config\Templates as View;

class showMainScreen {
	public $response;
	public $form;

	public function __construct($form) {
		$this->response = new AjaxResponse();
		$this->form = $form;
	}

	public function addResponse() {	
		$userData = $_SESSION["app_user_data"];
		//print_r($userData);die(" >> ");
		
		$messageService = new AppMessageService();
		$labels = $messageService->getMessages(['title_contacts', 'title_options', 'about', 'terms', 'help', 'title_welcome']);
		
		$ConTitle = $labels['tittle_contacts'];
		$OptTitle = $labels['tittle_options'];		
		$lbAbout = $labels['about'];
		$lbTerms = $labels['terms'];
		$lbHelp = $labels['help'];
		$view = new View();
		$view->smarty->assign("accountName",$userData["TXT_NAME"]);
		$view->smarty->assign("requests",$form['pendingRequests']);
		$view->smarty->assign("menu",$this->form["appMenu"]);
		$view->smarty->assign("optTitle",$OptTitle);
		$view->smarty->assign("contacts",$this->form["currentContacts"]);
		$view->smarty->assign("conTitle",$ConTitle);
		$mainHtml = $view->smarty->fetch("main.tpl.html");

		$this->response->setFunctionExc("setInnerHTML");

		$this->response->setResponse(
										[
											['divMaster',$mainHtml],
											//Only when the user has successfully logged in, the token is set to the main form
											['tokenContainer','<input type="hidden" name="token" id="token" value="'.$_SESSION['token'].'"/>']
										]);

		//print_r($this->response);die(" >> ");
	}
}
