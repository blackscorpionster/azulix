<?php
namespace helpers;

//If using Adodb, use this constant to define the case used in the results keys
if(!defined('ADODB_ASSOC_CASE')){
	define('ADODB_ASSOC_CASE',1); // 1 UpperCase, 0 LowerCase, 2 As written on the SQL sentence
}

//Db abstraction layer, does not support namespaces and autoload but works perfectly
require_once('../vendor/Adodb5/adodb.inc.php');

class Connect
{
	protected $host = \config\Config::APP_DB_HOST;
	protected $user = \config\Config::APP_DB_USER;
	protected $password = \config\Config::APP_DB_PASSWORD;
	protected $databaseName = \config\Config::APP_DB_NAME;
	protected $driver = \config\Config::APP_DB_DRIVER;
	public $db;
	
	public function __construct() 
	{
		$dbconexion = ADONewConnection($this->driver);
		$dbconexion->setFetchMode(ADODB_FETCH_ASSOC);
		$dbconexion->Connect($this->host, $this->user, $this->password, $this->databaseName);
		$dbconexion->EXECUTE("set names 'utf8'");
		$this->db = $dbconexion;
	}

	/**
	* Single datum Return
	* @param string $statement
	* @return string|null
	*/
	function returnScalar(string $statement): string
	{
		$info = null;
		if($this->dbm == "oci8" || $this->dbm == "oci8po")
		{
			$stmt = $this->$dbPrepareSP($statement);
			$this->db->Parameter($stmt, $info, 'info', false);
			$rs = $this->db->Execute($stmt);
		}
		else
		{
			$statement = "SELECT ".$statement." as RESPONSE";
			$rs = $this->db->Execute($statement);
			$info = $rs->GetRows();
			$info = $info[0]["RESPONSE"];
		}
		if(!$rs)
		{
			trigger_error('Problems trying to execute function :: '.$db->ErrorMsg(),E_USER_WARNING);
			$this->db->Close();
			return false;
		}
		else
		{
			$this->db->Close();
			return $info;
		}
	}

	/**
	* Multi data Return
	* @param string $statement
	* @return array
	*/
	function returnMultiData(string $statement): array
	{
		$res = [];
		$db = $this->db;
		if (in_array($this->driver ,['oci8', 'oci8po'])) {
			$stmt = $db->PrepareSP($statement);
			$db->Parameter($stmt, $info, 'info', false, -1, OCI_B_CURSOR);
		} else {
			if ('mysql' === $this->driver) {
				$statement = "call ".$statement;
			}
			$stmt = $db->Prepare($statement);
		}
		$rs = $db->Execute($stmt);
		if (!$rs) {
			trigger_error('Problems trying to execute function :: '.$db->ErrorMsg(),E_USER_WARNING);
			$db->Close();
			return [];
		} else {
			$res = $rs->GetRows();
			$db->Close();
			return $res;
		}
	}
	
	///Transactions executer
	function transaction(string $statement)
	{
		$info = true;
		$db = $this->db;
		if($this->dbm == "oci8" || $this->dbm == "oci8po")
		{
			$stmt = $db->PrepareSP($statement);
		}
		else
		{
			$stmt = $db->Prepare($statement);
		}
		//print_r($stmt);die();
		$rs = $db->Execute($stmt);
		if(!$rs)
		{
			trigger_error('Problems trying to execute procedure :: '.$db->ErrorMsg(),E_USER_WARNING);
			$db->Close();
			return false;
		}
		else
		{
			//die(">>>>OK>>".$info);
			$db->Close();
			return $info;
		}
	}
	
	///Transactions executer
	function transaction_param($statement, $params)
	{
		$info = true;
		$db = $this->Conectarse($this->hostDb, $this->usuAutocom, $this->passAutocom, $this->bddAutocom, $this->dbm);
		if($this->dbm == "oci8" || $this->dbm == "oci8po")
		{
			$stmt = $db->PrepareSP($statement);
		}
		else
		{
			$stmt = $db->Prepare($statement);
		}
		//print_r($stmt);die();
		$rs = $db->Execute($stmt, $params);
		if(!$rs)
		{
			trigger_error('Problems trying to execute procedure :: '.$db->ErrorMsg(),E_USER_WARNING);
			$db->Close();
			return false;
		}
		else
		{
			//die(">>>>OK>>".$info);
			$db->Close();
			return $info;
		}
	}

	/**
	* This functions builds the SQL sentence, depending on the db driver selected
	* @param string
	* @param string
	* @return string
	*/
	function buildSql(string $fName, string $param): string
	{
		if($this->driver == "oci8" || $this->driver == "oci8po")
			$sql = "BEGIN :info := ".$fName."(".$param."); END;";
		else
		{
			if($this->driver == "postgres9")
				$sql = "SELECT * FROM ".$fName."(".$param.")";
			else
				$sql = $fName."(".$param.")";
		}
		
		return $sql;
	}
	
	//This functions builds the  Procedure SQL sentence, depending on the db driver selected
	function buildSqlProcedure($f_name,$param,&$sql)
	{
		if($this->dbm == "oci8" || $this->dbm == "oci8po")
		{
			$sql = "BEGIN ".$f_name."(".$param."); END;";
		}
		else
		{
			
			if($this->dbm == "mysql")
				$sql = "call ".$f_name."(".$param.")";
			else
				$sql = "SELECT ".$f_name."(".$param.")";
		}
	}
	
	// FUNCIONES DE FUNCIONAMIENTO GENERAL
	
	function getSingleMessage($lang,$mesCod)
	{
		$plsql = "";
		$this->build_sql("FN_GETMESSAGE","'{$this->app}','{$lang}','{$mesCod}'",$plsql);
		$data = $this->sdr_function($plsql);
		//die("RETORNO>>>".$data." >> ".$plsql);
		return $data;
	}
	
	function getUserContacs($user,$lang)
	{
		$plsql = "";
		$this->build_sql("FN_USERCONTACTS","{$user},'{$lang}'",$plsql);
		$data = $this->mdr_function($plsql);
		return $data;
	}
	
}

/*function Conectarse($user,$pass,$bdd,$dbm)
{
$dbconexion = ADONewConnection('oci8po');
print_r($_SESSION);die("XXXX>>>>>>>".$user.' '.$pass.' '.$bdd.' '.$dbm); ///EL ERROR OCURRE CON LA LIBRERIA DE PHP 4
/*
 * 2.  take the .tgz file and put it in the openchat/include directory
3.  unpack the file with: 
gunzip -c adodb510.tgz | tar -xvf -
mv adodb adodb_old
mv adodb5 adodb

4.  Edit class.Chat.inc
vi class.Chat.inc 
Find:
    //create a database object
    $this->db = &NewADOConnection( DATABASE_DRIVER );

Replace with:

    //create a database object
    $this->db = NewADOConnection( DATABASE_DRIVER );
 * */
/*$dbconexion -> SetFetchMode(ADODB_FETCH_ASSOC);//Arreglo asociativo
$dbconexion->Connect(false, $user,$pass,$bdd);
//$dbconexion->Connect(false, 'epsis', 'epsis', 'desa');
//$dbconexion->Connect(false, 'estadistica', 'esta.3ps09', 'super');
return $dbconexion;
}*/
/*
$buneli_conect_def = array(
	"_SEGURO"=>array(false,"nalgahernandez","compensacion","super",'oci8'),
	//"_SEGURO"=>array(false,"seguro","rammstein","seguro",'mysql'),
	"_JSON"=>array(false,"nalgahernandez","compensacion","super"),
	"_ACC"=>array(false,"nalgahernandez","compensacion","super"),
	"_UTIL"=>array(false,"nalgahernandez","compensacion","super")
);*/
?>
