<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RepresentanteDTO
 *
 * @author Venan
 */
class RepresentanteDTO extends AbstractDTO {
    public $id;
    public $idFornecedor;
    public $nome;
    
    function getId() {
        return $this->id;
    }

    function getIdFornecedor() {
        return $this->idFornecedor;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdFornecedor($idFornecedor) {
        $this->idFornecedor = $idFornecedor;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
}
