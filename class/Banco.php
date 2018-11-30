<?php
/**
 * Created by PhpStorm.
 * User: Lucas Francelino
 * Date: 08/11/2018
 * Time: 19:13
 */

Class Banco{

    public $_DB;

    //CONSTRUTOR
    private function __construct()
    {

        $this->_DB = new PDO($this->_Type . ':host='. $this->_Host . ';dbname=' . $this->_Banco, $this->_User, $this->_Pass);

        //$this->_DB = new PDO("oci:dbname=(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 172.16.3.70)(PORT = 1521))(ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.200.52)(PORT = 1521)))(CONNECT_DATA =(SERVICE_NAME = trf1dsv.trf1.gov.br)(INSTANCE_NAME = trf1dsv))(SDU = 1460))", "TRFWEBINTRA", "intraweb");

        //$this->_DB = oci_connect("TRFWEBINTRA", "intraweb" , "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 172.16.3.70)(PORT = 1521))(ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.200.52)(PORT = 1521)))(CONNECT_DATA =(SERVICE_NAME = trf1dsv.trf1.gov.br)(INSTANCE_NAME = trf1dsv))(SDU = 1460))" ,'WE8ISO8859P1');
        $this->_DB = new Db();
    }


}


