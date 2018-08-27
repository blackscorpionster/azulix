<?php
/**
* Sure! php framework
* Especially designed for single page apps (Of course, traditional page projects are supported too), by default utilises adodb as database handling library
* and Smarty as template engine. However, if needed, these 2 default third party libraries can be easily replaced
* by doing the following:
* Replacing bd manager: Change helpers\Connect.php
* Replacing template manager: Change config\Templates.php
* This software comes with no warranty
* @author Guillermo Hernandez
* @email blackscorpionster@gmail.com
* @date_create 2018-08-12
* @version 1
*/
require_once("../config/Config.php");
require_once("../config/ErrorHandler.php");
require_once("../config/Autoload.php");

session_start();

//Change the token after the user has logged in successfully
if (empty($_SESSION['token'])) {
	$_SESSION['token'] = bin2hex(random_bytes(32));
}

//Captures all trigger_error calls and format them so they can be handled by the response manager
//See: AjaxResponse::manageMessages
set_error_handler("AppErrorHandler");

if (empty($_REQUEST["action"])) {
	trigger_error("opt_not_found",E_USER_ERROR);
	return sendResponse();
}

$language = 'eng';
if (!empty($_REQUEST["lang"])) {
	$language = $_REQUEST["lang"];
}

$_SESSION['app_language'] = $language;

$userRequestedAction = $_REQUEST["action"];

//App router manager
$optService = new src\services\OptionService();

//After the user has successfully logged into the system, 
//all the user options are recorded into the current session to keep them
//in memory allowing a faster access.
if(!isset($_SESSION['app_options']) && isset($_SESSION["app_user_data"]))
{
	$appOptions = $optService->getAppOptions();
	$_SESSION["app_options"] = $appOptions;
}

//If there are no options in the session the user has not signed in yet,
//but still the action can be of public access.
if (empty($_SESSION["app_options"])) {
	//Show login is public but no token is sent in the request, all other public actions need to send a token
	if ((int)$userRequestedAction !== \config\Config::APP_SHOW_LOGIN_ACTION) {
		if (empty($_REQUEST["token"]) || ($_REQUEST["token"] !== $_SESSION['token'])) {
			trigger_error("opt_not_found",E_USER_ERROR);
			return sendResponse();
		}
	}

	$appOption = $optService->getAppOption($userRequestedAction);
	if (empty($appOption)) {
		trigger_error("opt_not_found",E_USER_ERROR);
		return sendResponse();
	}

	$currentAction = $appOption[0];
	if (!isset($currentAction['PUBLIC']) || 1 !== (int)$currentAction['PUBLIC']) {
		trigger_error("opt_not_found",E_USER_ERROR);
		return sendResponse();
	}
}

//If the user has logged in successfully, Check the app token only if the action is not LogIn.
//Is action is login and there is user data in the Session, it means that the user is probably 
//opening a new tab in the same browser
if (!empty($_SESSION["app_options"])) {
	$appOptions = $_SESSION["app_options"];
	$currentAction = obtainCurrentAction($userRequestedAction);

	if ((empty($_REQUEST["token"]) || $_REQUEST["token"] !== $_SESSION['token']) && !in_array((int)$userRequestedAction, [\config\Config::APP_SHOW_LOGIN_ACTION, \config\Config::APP_LOGIN_ACTION])) {
		//Log the user out and show the login page
		$currentAction = obtainCurrentAction(\config\Config::APP_LOG_OUT);
	}

	if (empty($_SESSION["app_user_data"])) {
		//Log the user out and show the login page
		$currentAction = obtainCurrentAction(\config\Config::APP_LOG_OUT);
	}
}

//If no action found, stop
if (empty($currentAction)) {
	trigger_error("opt_not_found",E_USER_ERROR);
	return sendResponse();
}

//MVC controller
$appObject = new config\AppObj($currentAction,$_REQUEST);

$response = null;

//Framework
if($appObject->flgAction)
{
	$appObject->validateForm();

	$appObject->executeAction();

	$response = $appObject->showResponse();
}
else
{
	$response = new helpers\AjaxResponse();
	trigger_error("opt_not_found",E_USER_ERROR);
}

//Sends the response to the user
return sendResponse($response);

function sendResponse(helpers\AjaxResponse $response = null) {
	if (!$response instanceof helpers\AjaxResponse) {
		$response = new helpers\AjaxResponse();
	}

	//User Messages and Error are verified and moved into the response
	$response->manageMessages($response);
	
	restore_error_handler();
	
	//Send the user's response
	print(json_encode($response));
}
//            END             //

//Get the option information
function obtainCurrentAction($opt)
{
	$arrReturn = array();
	$options = $_SESSION["app_options"];
	foreach($options as $key => $arrOpt)
	{
		if($arrOpt["COD_OPTION"]==$opt)
		{
			return $arrOpt;
		}
	}
	return $arrReturn;
}
