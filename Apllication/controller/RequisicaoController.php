<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RequisicaoController
 *
 * @author Venan
 */
class RequisicaoController extends AbstractController {
    public function enviarItemRequisicao($a) {
        session_start();
        $dto = $this->setAttributes($a);
        if (!isset($_SESSION['requisicaoSessao'])) {
            $_SESSION['requisicaoSessao'] = uniqid();
        }
         
        $dto->setSessao($_SESSION['requisicaoSessao']);
        $dto->save();
        echo $dto->getLastObject();
        
    }

    public function saveRequisicao($a){
        session_start();
        $dto = $this->setAttributes($a);
        $dto->setSessao($_SESSION['requisicaoSessao']);
        $dto->setStatus(1);
        $dto->save();
      
        unset($_SESSION['requisicaoSessao']);
       }
       
    public function excluir($a){
        $dto = $this->setAttributes($a);
        $dto->deleteRequisicao($dto->getSessao());
    }
    public function changeStatus($a){
        $dto = $this->setAttributes($a);
        $dto->changeStatusR($dto->getSessao());
    }

        public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
    
}
