<?php
namespace src\services;
use helpers\Connect;

class AppUserService {
	private $app = \config\Config::APP_CODE;
	protected $dbManager;
	
	/**
	* @para string $language
	*/
	public function __construct() {
		$this->dbManager = new Connect();
	}
	
	/**
	* Returns array with the user's information, if found
	* @param string $userName
	* @param string $password
	* @return array
	*/
	public function validateUser($userName, $password)
	{
		$plsql = $this->dbManager->buildSql('FN_VALIDATE_USER',"'{$userName}','{$password}'",$plsql);
		return $this->dbManager->returnMultiData($plsql);
	}

}