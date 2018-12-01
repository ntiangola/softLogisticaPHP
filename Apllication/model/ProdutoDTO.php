<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutoDTO
 *
 * @author Venan
 */
class ProdutoDTO extends AbstractDTO {
    public $id;
    public $categoria;
    public $nome;
    
    function getId() {
        return $this->id;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }
    
        public function findAll() {
        $queryString = "SELECT *
                        FROM produto 
                        ";
           $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

   public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
}
