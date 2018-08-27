<?php
namespace config;

require_once("../vendor/Smarty/libs/Smarty.class.php");
class Templates
{
	public $smarty;
	public function __construct()
	{
		$this->smarty = new \Smarty();
		
		$this->smarty->setTemplateDir('../web/views/templates/');
		$this->smarty->setCompileDir('../web/views/templates_c/');
		$this->smarty->setConfigDir('../web/views/templates_conf/');
		$this->smarty->setCacheDir('../web/views/templates_cache/');
	}
}