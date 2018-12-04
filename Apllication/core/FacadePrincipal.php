<?php
function __autoload($f){
    if(file_exists("../Apllication/core/".$f.".php"))
            require("../Apllication/core/".$f.".php");
    else if(file_exists("../Apllication/controller/".$f.".php"))
            require("../Apllication/controller/".$f.".php");
    else if(file_exists("../Apllication/model/".$f.".php"))
            require("../Apllication/model/".$f.".php");
    else if(file_exists("../Apllication/util/".$f.".php"))
            require("../Apllication/util/".$f.".php");
        
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacadePrincipal
 *
 * @author Nakassony.Bernardo
 */
class FacadePrincipal {
    //put your code here
    public function mensagemController(){
        return new MensagemController();
    }

    public function utilizadorController(){
        return new UtilizadorController();
    }
    
    public function produtoController(){
        return new ProdutoController();
    }
    public function fornecedorController(){
        return new FornecedorController();
    }
    public function funcionarioController(){
        return new FuncionarioController();
    }
    public function requisicaoController(){
        return new RequisicaoController();
    }

}

$facadePrincipal = new FacadePrincipal();

?>
