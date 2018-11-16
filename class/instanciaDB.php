<?php

class instanciaDB
{
public $_DB;
public $_Type;
public $_Host;
public $_User;
public $_Pass;
public $_Banco;

protected static $instacia = NULL;

private function __construct()
{
$this->_Type = DB_TYPE;
$this->_Host = DB_HOST;
$this->_User = DB_USER;
$this->_Pass = DB_PASS;
$this->_Banco = DB_DATABASE;
$opcoes = array(
PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'Latin1'"
);
$this->_DB = new PDO($this->_Type . ':host='. $this->_Host . ';dbname=' . $this->_Banco, $this->_User, $this->_Pass, $opcoes);
}

static public function getInstancia()
{
if(!self::$instacia instanceof self) { self::$instacia = new self; }
return self::$instacia;
}
}
?>