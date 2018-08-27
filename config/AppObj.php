<?php
namespace config;

class AppObj
{
	var $objValidate;
	var $objExecute;
	var $objShow;
	var $objShow_default = \config\Config::APP_SHOW_DEFAULT_VIEW;
	var $form;
	var $flgValidate = false;
	var $flgExecution  = false;
	var $flgAction = false;

	function __construct(array $actionArray, array $data)
	{
		if(count($actionArray)>0)
		{
			try 
			{
				$this->objValidate = $actionArray["URL_VALIDATE"];
				$this->objExecute = $actionArray["URL_EXECUTE"];
				$this->objShow = $actionArray["URL_DRAW"];
				$this->form = $data;
				$this->flgAction = true;
			} catch (Exception $e) 
			{
				trigger_error("empty_option",E_USER_ERROR);
			}
		}
	}

	function validateForm()
	{
		if ($this->objValidate) {
			$className = 'src\\form\\'.str_replace('.php', null, $this->objValidate);
			$externalForm = new $className($this->form);
			$this->flgValidate = $externalForm->validateRequest($this->form);
			$this->form = $externalForm->form;
		} else {
			$this->flgValidate = true;
		}
	}

	function executeAction()
	{
		//If there is not controller and all validations were successful, then return and continue to the view
		if (empty($this->objExecute) && $this->flgValidate) {
			$this->flgExecution = true;
			return;
		}
		//Executes the action
		if ($this->objExecute && $this->flgValidate) {
			$className = 'src\\controller\\'.str_replace('.php', null, $this->objExecute);
			$actionRules = new $className($this->form);
			$this->flgExecution = $actionRules->executeAction();
			$this->form = $actionRules->form;
		}
	}

	function showResponse() {
		$className = null;
		if(!empty($this->objShow) && true === $this->flgExecution) {
			$className = $this->objShow;
		} else {
			$className = $this->objShowDefault;
		}
		
		$className = 'src\\view\\'.str_replace('.php', null, $className);
		
		$response = new $className($this->form);
		$response->addResponse();
		return $response->response;
	}
}
