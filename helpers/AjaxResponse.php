<?php
namespace helpers;

/**
 * @author Guillermo Hernandez Diaz <blackscorpionster@gmail.com>
 *
 * @date 10 octubre 2008
 * @version 
 */
class AjaxResponse
{
	/**
	 * Captured run time errors
	 *
	 * @var array
	 * @access private
	 */
	var $errors;
	
	/**
	 * Any message that needs to be sent to the user
	 *
	 * @var array
	 * @access private
	 */
	var $messages;

	/**
	 * Json object with the desired response
	 *
	 * @var array
	 * @access private
	 */
	var $response;
	
	/**
	 * JS function to execute after the response has been received by the client
	 *
	 * @var array
	 * @access private
	 */
	var $functionExc;
	
	
	/**
	 * Constructor
	 */
	function __construct() {
		$this->errors = null;
		$this->messages = null;
		$this->response = null;
		$this->functionExc = null;
	}
	
	/**
	 * Asigna el arreglo con los mensajes de error almacenados en la session
	 *
	 * @param array Arreglo con los mensajes de error
	 * @return void
	 * @access public
	 */
	 function setErrors(array $msgsErrors)
	 {
	 	$this->errors = $msgsErrors;
	 }
	 
	/**
	 * Asigna el arreglo con los mensajes de error almacenados en la session
	 *
	 * @param array Arreglo con los mensajes de error
	 * @return array
	 * @access public
	 */
	 function getErrors(): array
	 {
	 	return $this->errors;
	 }
	 
	/**
	 * Asigna el arreglo con los mensajes almacenados en la session
	 *
	 * @param array Arreglo con los mensajes generados en la ejecucion del programa
	 * @return void
	 * @access public
	 */
	 function setMessages(array $appMessages)
	 {
	 	$this->messages = $appMessages;
	 }
	 
	/**
	 * Asigna el arreglo con los mensajes de error almacenados en la session
	 *
	 * @param array Arreglo con los mensajes de error
	 * @return array
	 * @access public
	 */
	 function getMessages(): array
	 {
	 	return $this->messages;
	 }
	 
	/**
	 * Asigna el arreglo con la respuesta para el Ajax, esta respuesta debe ser en formato JavasCript - Html - Texto Plano
	 *
	 * @param array Arreglo con las estructuras de datos para el javascript
	 * @return void
	 * @access public
	 */
	 function setResponse(array $appResponse)
	 {
	 	$this->response = $appResponse;
	 }
	 
	/**
	 * Asigna el arreglo con los mensajes de error almacenados en la session
	 *
	 * @param array Arreglo con los mensajes de error
	 * @return array
	 * @access public
	 */
	 function getResponse(): array
	 {
	 	return $this->response;
	 }
	 
	/**
	 * Asigna la funcion de Javascript que debe ejcutar despues de hacer el response
	 *
	 * @param string nombre de la funcion
	 * @return void
	 * @access public
	 */
	 function setFunctionExc(string $funcion)
	 {
	 	$this->functionExc = $funcion;
	 }
	 
	/**
	 * Asigna el arreglo con los mensajes de error almacenados en la session
	 *
	 * @param array Arreglo con los mensajes de error
	 * @return string
	 * @access public
	 */
	 function getFunctionExc(): string
	 {
	 	return $this->functionExc;
	 }
	 
	//Check whether menssages or errores exist or not in the session
	public function manageMessages() {
		if(array_key_exists("_ERRORES",$_SESSION))
		{
			if (count($_SESSION["_ERRORES"])>0)
			{
				$this->setErrors($_SESSION["_ERRORES"]);
				unset($_SESSION["_ERRORES"]);
			}
		}

		if(array_key_exists("_MENSAJES",$_SESSION))
		{
			if (count($_SESSION["_MENSAJES"])>0)
			{
				$this->setMessages($_SESSION["_MENSAJES"]);
				unset($_SESSION["_MENSAJES"]);
			}
		}
	}
}
