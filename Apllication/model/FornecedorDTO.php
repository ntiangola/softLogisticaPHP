<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FornecedorDTO
 *
 * @author Venan
 */
class FornecedorDTO extends AbstractDTO {
    public $id;
    public $nome;
    public $site;
    
  

    function getNome() {
        return $this->nome;
    }

    function getSite() {
        return $this->site;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSite($site) {
        $this->site = $site;
    }
    
          public function findFornecedor() {
        $queryString = "SELECT f.*, r.nome as representante
                        FROM fornecedor f
                        INNER JOIN representante r ON f.id = r.idFornecedor
                        ";
           $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
}
