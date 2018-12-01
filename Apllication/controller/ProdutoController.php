<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutoController
 *
 * @author Venan
 */
class ProdutoController extends AbstractController {
    public function save($a){
        $dto = $this->setAttributes($a);
        $dto->save();
        header("location: Pages/produto.php ");
    }
    
       public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
}
