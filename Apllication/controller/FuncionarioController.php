<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FuncionarioController
 *
 * @author Venan
 */
class FuncionarioController extends AbstractController {
     public function save($a){
        $dto = $this->setAttributes($a);
        $dto->save();
    }
    public function excluir($a){
        $dto = $this->setAttributes($a);
        $dto->delete();
    }
    public function actualizarFuncionario($a){
        $dto = $this->setAttributes($a);
        if ($dto->exist('id')) {
            $dto->update('id');
           }
    }

        public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
}
