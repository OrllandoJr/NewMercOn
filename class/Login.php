<?php


Class Login extends baseDAO
{

    function __construct($codigo="") {
        parent::__construct($codigo);
        if ($codigo!= "") {
        //TODO: AUTENTICADO 
        }
        else{
        //TODO: Não Autenticado
        }
        }

    public function logar($_email, $_senha){

        if ($_email != "" && $_senha != "") {
            
            $sql = "select * from tb_usuario where ds_email = '{$_email}' and ds_senha = '{$_senha}' " ;

            $r = $this->consulta($sql);

            if(!Empty($r)){
                return "0";
            }
            
            else{
                return "-1";
            }
            } 
            
            else{
            return '-2';
            }

      unset($r);
        

    }

}