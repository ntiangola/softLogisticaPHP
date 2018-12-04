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
    public $razaoSocial;
    public $email;
    public $bairro;
    public $telefone;
    public $cp;
    public $fax;
    public $cidade;
    public $site;
    
  

    function getNome() {
        return $this->nome;
    }

    function getRazaoSocial() {
        return $this->razaoSocial;
    }

    function getEmail() {
        return $this->email;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getCp() {
        return $this->cp;
    }

    function getFax() {
        return $this->fax;
    }

    function getCidade() {
        return $this->cidade;
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

    function setRazaoSocial($razaoSocial) {
        $this->razaoSocial = $razaoSocial;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setCp($cp) {
        $this->cp = $cp;
    }

    function setFax($fax) {
        $this->fax = $fax;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setSite($site) {
        $this->site = $site;
    }

        
          public function findFornecedor() {
        $queryString = "SELECT f.*, r.id as idRepresentante, r.nome as representante, r.bairro as bairroR, r.email as emailR, r.cidade as cidadeR
                        FROM fornecedor f
                        INNER JOIN representante r ON f.id = r.idFornecedor
                        ";
           $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
          public function findFornecedorById($id) {
        $queryString = "SELECT f.*, r.nome as representante, r.bairro as bairroR, r.email as emailR, r.cidade as cidadeR
                        FROM fornecedor f
                        INNER JOIN representante r ON f.id = r.idFornecedor
                        WHERE f.id = '$id'
                        ";
           $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
}
