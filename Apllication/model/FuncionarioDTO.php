<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FuncionarioDTO
 *
 * @author Venan
 */
class FuncionarioDTO extends AbstractDTO {
    public $id;
    public $nome;
    public $cargo;
    public $departamento;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getDepartamento() {
        return $this->departamento;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }
    
    
            public function findAllFuncionario() {
        $queryString = "SELECT *
                        FROM funcionario
                        ";
           $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
        public function findFuncionarioById($id) {
        $queryString = "SELECT *
                        FROM funcionario 
                        WHERE id='$id'
                        ";
           $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
}
