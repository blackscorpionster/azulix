<?php
// Services should not use elements from the session, this use these methods can be reused for instance by API end points
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
	/**
	* Finds all contact requests made by other users
	* @param integer $userId
	* @return array
	*/
	public function getContactRequests(int $userId) {
		$plsql = $this->dbManager->buildSql('FN_USERREQUESTS', "{$userId}");
 		$data = $this->dbManager->returnMultiData($plsql);
		return $data;
	}
}