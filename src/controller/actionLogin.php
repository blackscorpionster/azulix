<?php
	/***************************************************************************************************************
	 * 14/06/2012.
	* Guillermo Hernandez.
	* This object contains the rules to be exeuted, this is the core of the action itself.
	* All rights reserved.
	* buneli.com, buneli, JSON SAYS are trademarks, patent under revision.
	*************************************************************************************************************** */
namespace src\controller;
use src\services\AppUserService as auth;
use src\services\OptionService;
use src\services\ContactService;

class actionLogin
{
	public $form;

	public function __construct($form) {
		$this->form = $form;
	}

	function executeAction()
	{
		$auth = new auth();
		$generateToken = true;
		if(!isset($_SESSION["app_user_data"])) {
			$txtLogin = $this->form["txtLogin"];
			$txtPass = $this->form["txtPassEncoded"];
			$userData = $auth->validateUser($txtLogin,$txtPass);
			//print_r($userData);die(">>>");
		
			$userData = $userData[0];
			if (!empty($userData)) {
				$userId = $userData["COD_USER"];
			}
		}
		else
		{
			$userData = $_SESSION["app_user_data"];
			$userId = $userData["COD_USER"];
			
			//If there is a token already, do not regenerate it
			if (!empty($_SESSION['token'])) {
				$generateToken = false;
			}
		}

		//print_r($userData);die();

		if (empty($userData)) {
			trigger_error("user_not_found",E_USER_ERROR);
			return false;
		}

		//The app options are recovered to create the application menu
		if (!isset($_SESSION["app_options"])) {
			$optionService = new OptionService();
			$options = $optionService->getAppOptions();
		} else {
			$options = $_SESSION["app_options"];
		}
 
		$appMenu = array();
		//print_r($options);die();
		foreach($options as $pos => $arrOpt)
		{
			//if OPT_MENU = 1 then, it's a main option menu, but if it is 2, is session option
			if (empty($arrOpt["OPT_MENU"]) || 1 !== (int)$arrOpt["OPT_MENU"]) {
				continue;
			}

			$appMenu[$arrOpt["TXT_OPTION"]]["OPT_COD"] = $arrOpt["COD_OPTION"];
			$appMenu[$arrOpt["TXT_OPTION"]]["ICON"] = $arrOpt["ICON"];
			if($arrOpt["POP_UP"])
			{
				$appMenu[$arrOpt["TXT_OPTION"]]["COMMAND"] = command($arrOpt["COD_OPTION"],$arrOpt["TXT_COMMAND"],'P');//"popUpWindow(".$arrOpt["COD_OPTION"].")";
			}
			else {
				$appMenu[$arrOpt["TXT_OPTION"]]["COMMAND"] = command($arrOpt["COD_OPTION"],$arrOpt["TXT_COMMAND"],null);//"callOption(".$arrOpt["COD_OPTION"].")";
			}
		}
		//print_r($appMenu);die();
		if(empty($appMenu)) {
			trigger_error("menu_not_found",E_USER_ERROR);
			return false;
		}

		//Contacts and pending requests..
		$contactService = new ContactService();
		$userContacts = $contactService->getUserContacs((int)$userId);

		//Split the information between actual Contacts and pending requests
		$contacts = array();
		$requests = 0;
		foreach($userContacts as $pos => $arrContact)
		{
			if($arrContact["COD_STATE"] == 1)
			{
				$contacts[$pos] = $arrContact;
			}
			elseif($arrContact["COD_STATE"] == 2)
			{
				$requests++;
			}
		}
		
		$this->form["currentContacts"] = $contacts;
		$this->form["appMenu"] = $appMenu;
		$this->form["pendingRequests"] = $requests;
		
		//Session variables, these will persist during run time
		$_SESSION["app_user_data"] = $userData;
		if (!empty($options)) {
			$_SESSION["app_options"] = $options;
		}
		
		//Change the token after the user has logged in successfully
		if ($generateToken) {
			$_SESSION['token'] = bin2hex(random_bytes(32));
		}

		return true;
	}
}

function command($cod,$com,$opt)
{
	if( $com )
		return $com;
	else
	{
		if($opt == 'P')
			return "popUpWindow(".$cod.")";
		else
			return "callOption(".$cod.")";
	}
}