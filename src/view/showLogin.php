<?php
namespace src\view;
use helpers\AjaxResponse;
use src\services\AppMessageService;
use config\Templates as View;
use \config\Config;

class showLogin {
	public $response;
	public $form;

	public function __construct($form) {
		// $this->response = new AjaxResponse();
		$this->form = $form;
	}
	
	public function addResponse() {
		if(isset($_SESSION["app_user_data"])) {
			$this->response->setFunctionExc("validateLogin");
			return;
		}
		
		$messageService = new AppMessageService();
		$labels = $messageService->getMessages(['log_in', 'user_text', 'pass_txt']);

		$view = new View();
		//die(" >>> " . $_SERVER['DOCUMENT_ROOT'].'/'.\config\Config::APP_DIR_NAME.'/');
		//$view->smarty->assign("rootDir", Config::APP_DIR_NAME.'/');
		$view->smarty->assign("token", $_SESSION['token']);
		$view->smarty->assign("labels", $labels);
		$view->smarty->display("login.tpl.html");
		// $html = $view->smarty->fetch("login.tpl.html");
		
		// $this->response->setFunctionExc("setCenterInnerHTML");

		// $this->response->setResponse([
		// 								["divMaster","divLogin"],
		// 								[
		// 									["divMaster",$html],
		// 								],
		// 							]);
	}
}
