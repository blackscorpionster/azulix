<?php
namespace src\view;
use helpers\AjaxResponse;
use src\services\AppMessageService;
use config\Templates as View;

class showAddContact {
	public $response;
	public $form;

	public function __construct($form) {
		$this->response = new AjaxResponse();
		$this->form = $form;
	}

	public function addResponse()
	{
		//Build the user's HTML response
		$requests = $this->form['user_requests'];
		
		$appMessageService = new AppMessageService();
		$labels = $appMessageService->getMessages(['add_contact', 'find_usr_lbl', 'find_contact', 'delete_contact', 'send_frequest']);

		$view = new View();
		$view->smarty->assign("labels", $labels);
		$view->smarty->assign("requests", $requests);
		$boxes = $view->smarty->fetch("usersDirectory.tpl.html");
		
		$response = new AjaxResponse();
		//$boxes = utf8_encode($boxes);
		print($boxes);die();
		$response->setFunctionExc("userDirectory");//("setObjectAsANewSon");
		
		$response->setResponse( 
								array(
										array("divMsgBoxes",$boxes,"divMainDirectoryBox")
									 )
								);
		
		return $response;
	}
}
