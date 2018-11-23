<?php


Class Cadastrar extends baseDAO
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

    public function cadastrar($_nome, $_email, $_senha, $_cpf, $_cep, $_endereco, $_fone){
        $senha = md5($_senha);
 
        if ($_nome != "" && $_email != "" && $_senha != "" && $_cpf != "" && $_cep != "" && $_endereco != "" && $_fone != "") {
            

            $sql = "INSERT INTO TB_USUARIO (DS_USUARIO, DS_EMAIL, DS_SENHA, NU_CPF, NU_TELEFONE, DS_ENDERECO, DS_COMPLEMENTO) 
            VALUES('{$_nome}', '{$_email}',  '{$senha}', '{$_cpf}', '{$_cep}', '{$_endereco}', '{$_fone}' )";


            $retorna = $this->execute($sql);

            
            return $retorna;
            }

      unset($retorna);
        

    }

}
?>