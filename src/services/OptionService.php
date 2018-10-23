<?php
namespace src\services;
use helpers\Connect;
use config\Config;

class OptionService {
	private $app = \config\Config::APP_CODE;
	private $language;
	protected $dbManager;
	
	/**
	* @para string $language
	*/
	function __construct() {
		$this->language = $_SESSION['app_language'] ?: 'eng';
		$this->dbManager = new Connect();
	}
	
	/**
	* Returns all available options in the app
	* @return array
	*/
	function getAppOptions(): array {
		$plsql = $this->dbManager->buildSql("FN_APPOPTIONS","{$this->app}, '{$this->language}'");
		return $this->dbManager->returnMultiData($plsql);
	}
	
	/**
	* @param integer $action
	* @return array
	*/
	function getAppOption($action): array {
		//if the action is show login, do not go to the DB, this might lead to a DB obstruction if
		//a hacker makes mane request to the app ROOT
		if ((int)$action === Config::APP_SHOW_LOGIN_ACTION) {
			return Config::APP_SHOW_LOGIN_URL;
		}
		
		$plsql = $this->dbManager->buildSql("FN_APPOPTION", "{$this->app}, '{$this->language}', {$action}");
		return $this->dbManager->returnMultiData($plsql);
	}
}
