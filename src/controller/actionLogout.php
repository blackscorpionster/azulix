<?php
namespace src\controller;

class actionLogout {
	public $form;

	public function __construct($form) {
		$this->form = $form;
	}

	function executeAction() {
		session_start();
		session_unset();
		session_destroy() or die("Error");
		if(isset($_COOKIE[session_name()]))
		{
			setcookie(session_name(), '', time()-3600, '/');
		}
		return true;
	}
}
