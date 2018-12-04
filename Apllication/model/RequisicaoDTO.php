<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RequisicaoDTO
 *
 * @author Venan
 */
class RequisicaoDTO extends AbstractDTO {
    public $id;
    public $idFuncionario;
    public $data;
    public $status;
    public $urgencia;
    public $obs;
    public $sessao;
    
    function getId() {
        return $this->id;
    }

    function getIdFuncionario() {
        return $this->idFuncionario;
    }

    function getData() {
       return empty($this->data) ? date('d-m-Y') : $this->data;
    }

    function getStatus() {
        return $this->status;
    }

    function getUrgencia() {
        return $this->urgencia;
    }

    function getObs() {
        return $this->obs;
    }

    function getSessao() {
        return $this->sessao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdFuncionario($idFuncionario) {
        $this->idFuncionario = $idFuncionario;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setUrgencia($urgencia) {
        $this->urgencia = $urgencia;
    }

    function setObs($obs) {
        $this->obs = $obs;
    }

    function setSessao($sessao) {
        $this->sessao = $sessao;
    }

public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
    
public function intensBySessao($sessao) {
  $queryString = "SELECT it.id, it.idProduto, SUM(it.qtd) as qtd, p.nome
                	FROM itensrequisicao it
                  INNER JOIN produto p ON p.id = it.idProduto 
                  WHERE it.sessao = '$sessao'
                  GROUP BY it.idProduto
                        ";
           $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
public function findRequisicao() {
  $queryString = "SELECT r.*, f.nome, f.departamento
                         FROM requisicao r 
                         INNER JOIN funcionario f ON f.id = r.idFuncionario
                        ";
           $query = $this->Connection()->query($queryString);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
public function changeStatusR($sessao) {
  $queryString = "UPDATE requisicao  SET status = '2' WHERE sessao = '$sessao'";
  $this->Connection()->query($queryString);
     }
     
public function deleteRequisicao($sessao) {
  $queryString = "START TRANSACTION;
                        DELETE
                        FROM requisicao
                        WHERE sessao = '$sessao';

                        DELETE
                        FROM    itensRequisicao
                        WHERE   sessao = '$sessao';
                        COMMIT;";
    $this->Connection()->query($queryString);
    }
    
    
}
