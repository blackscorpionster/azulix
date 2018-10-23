<?php
namespace src\services;
use helpers\connect;

class AppMessageService {
	private $app = \config\Config::APP_CODE;
	private $language;
	protected $dbManager;

	function __construct() {
		$this->language = $_SESSION['app_language'] ?: 'eng';
		$this->dbManager = new Connect();
	}
	
	public function getMessages(array $messages): array {
		$sql = $this->dbManager->buildSql('FN_GETMESSAGES', $this->app.", '{$this->language}'".',\'{"'.implode('","', $messages).'"}\'::varchar[]');
		$data = $this->dbManager->returnMultiData($sql);
		$result = [];
		if (count($data) > 0) {
			foreach ($data as $pos => $currentIteration) {
				$result[$currentIteration['COD_MESSAGE']] = $currentIteration['TXT_MESSAGE'];
			}
		}
		return $result;
	}
}