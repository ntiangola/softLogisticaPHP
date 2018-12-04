<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FornecedorController
 *
 * @author Venan
 */
class FornecedorController extends AbstractController {
    
    public function save($a){
        $dto = $this->setAttributes($a);
        $dto['FornecedorDTO']->save();
        $idForncedor =  $dto['FornecedorDTO']->getId();
        
        $dto['RepresentanteDTO']->setIdFornecedor($idForncedor);
        $dto['RepresentanteDTO']->save();
        
        
    }
    public function excluir($a){
        $dto = $this->setAttributes($a);
        $dto['FornecedorDTO']->delete();
        $dto['RepresentanteDTO']->delete();
        
    }
    public function actualizarFornecedor($a){
        $dto = $this->setAttributes($a);
        if ($dto['FornecedorDTO']->exist('id')) {
           $dto['RepresentanteDTO']->setIdFornecedor($dto['FornecedorDTO']->getId());
            
            $dto['FornecedorDTO']->update('id');
            $dto['RepresentanteDTO']->update('idFornecedor');
           }
        #header('location: Pages/Produtos/index.php?id='.$dto['ProdutoDTO']->getId());
        
    }

        public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
}
