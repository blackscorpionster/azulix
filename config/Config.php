<?php
namespace config;

class Config {
	public const APP_CODE = 1;
	public const APP_SHOW_LOGIN_ACTION = 10000;
	public const APP_SHOW_LOGIN_URL = [[
				"URL_EXECUTE" => null,
				"URL_VALIDATE" => null,
				"URL_DRAW" => 'showLogin.php',
				"PUBLIC" => 1
			]];
	public const APP_LOGIN_ACTION = 1;
	public const APP_LOG_OUT = 2;
	public const APP_DIR_NAME = 'azulix';
	public const APP_SHOW_DEFAULT_VIEW = 'showDefault.php';
	public const APP_DB_HOST = 'localhost';
	public const APP_DB_USER = 'postgres';
	public const APP_DB_PASSWORD = 'NewLife2014*';
	public const APP_DB_NAME = 'azulix_dev';
	public const APP_DB_DRIVER = 'postgres9';
}