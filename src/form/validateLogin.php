<?php
	/***************************************************************************************************************
	 * 14/06/2012.
	 * Guillermo Hernandez.
	 * Validatig forms process is suppossed not to access the database, they only validate how acurrate the data are.
	 * All rights reserved.
	 * buneli.com, buneli, JSON SAYS are trademarks, patent under revision.
	 ***************************************************************************************************************/
namespace src\form;
class validateLogin
{
	public $form;

	public function __construct($form) {
		$this->form = $form;
	}
	function validateRequest()
	{
		$ret = true;
		
		if(!isset($_SESSION["app_user_data"]))
		{
			$login = $this->form["txtLogin"];
			$pass =  $this->form["txtPass"];
			if (empty($login) || empty($pass)) {
				trigger_error("login_data_miss",E_USER_ERROR);
				$ret = false;
			} else {
				$this->form["txtPassEncoded"] = md5($this->form["txtPass"]);
				unset($this->form["txtPass"]);
			}
		}
		return $ret;
	}
}
