<?php
namespace src\view;
use helpers\AjaxResponse;

class showRestartApp {
	public $response;
	public $form;

	public function __construct($form) {
		$this->response = new AjaxResponse();
		$this->form = $form;
	}
	
	public function addResponse() {
		$this->response->setFunctionExc("restartApp");
	}
}
