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
    public $bairro;
    public $email;
    public $cidade;
    
    function getId() {
        return $this->id;
    }

    function getIdFornecedor() {
        return $this->idFornecedor;
    }

    function getNome() {
        return $this->nome;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getEmail() {
        return $this->email;
    }

    function getCidade() {
        return $this->cidade;
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

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
}
