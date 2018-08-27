<?php
namespace src\services;
use helpers\Connect;

class ContactService {
	private $app = \config\Config::APP_CODE;
	private $language;
	protected $dbManager;
	
	/**
	* @para string $language
	*/
	public function __construct() {
		$this->language = $_SESSION['app_language'] ?: 'eng';
		$this->dbManager = new Connect();
	}
	
	/**
	* Returns all user's contacts (Active or Pending of approval)
	* @param int $userId
	* @return array
	*/
	public function getUserContacs(int $userId)
	{
		$plsql = $this->dbManager->buildSql("FN_USERCONTACTS","{$userId},'{$this->language}'");
 		$data = $this->dbManager->returnMultiData($plsql);
		return $data;
	}

}