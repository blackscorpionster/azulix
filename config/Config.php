<?php
namespace config;

class Config {
	const APP_CODE = 1;
	const APP_SHOW_LOGIN_ACTION = 10000;
	const APP_SHOW_LOGIN_URL = [[
				"URL_EXECUTE" => null,
				"URL_VALIDATE" => null,
				"URL_DRAW" => 'showLogin.php',
				"PUBLIC" => 1
			]];
	const APP_LOGIN_ACTION = 1;
	const APP_LOG_OUT = 2;
	const APP_DIR_NAME = 'azulix';
	const APP_SHOW_DEFAULT_VIEW = '../src/view/showDefault.php';
	const APP_DB_HOST = false;
	const APP_DB_USER = 'postgres';
	const APP_DB_PASSWORD = 'NewLife2014';
	const APP_DB_NAME = 'azulix_dev';
	const APP_DB_DRIVER = 'postgres9';
}