<?php
//Autoload app's classes: adds suport for Namespaces
spl_autoload_register(function($className) {		
	$className = str_replace('\\', '/', $className);
	$baseName = $_SERVER['DOCUMENT_ROOT'].'/'.\config\Config::APP_DIR_NAME.'/'.$className;
	$importFilePath = $baseName.'.php';
	$importFilePathClass = $baseName.'.class.php';
	
	if (file_exists($importFilePath)) {
		include_once($importFilePath);
	}
	if (file_exists($importFilePathClass)) {
		include_once($importFilePathClass);
	}
});
