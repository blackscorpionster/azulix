<?php
namespace src\controller;
use src\services\ContactService;

class actionFindRequests
{
	public $form;

	public function __construct($form) {
		$this->form = $form;
	}

	public function executeAction(): bool
	{
		$contactService = new ContactService();
		$requests = $contactService->getContactRequests($_SESSION['app_user_data']['COD_USER']);
		
		$this->form['user_requests'] = $requests;
		return true;
	}
}
