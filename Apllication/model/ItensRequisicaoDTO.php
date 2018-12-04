<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItensRequisicaoDTO
 *
 * @author Venan
 */
class ItensRequisicaoDTO extends AbstractDTO {
    public $id;
    public $idProduto;
    public $qtd;
    public $sessao;
    
    function getId() {
        return $this->id;
    }

    function getIdProduto() {
        return $this->idProduto;
    }

    function getQtd() {
        return $this->qtd;
    }

    function getSessao() {
        return $this->sessao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    function setQtd($qtd) {
        $this->qtd = $qtd;
    }

    function setSessao($sessao) {
        $this->sessao = $sessao;
    }

public function __construct($c = __CLASS__) {
        parent::__construct($c);
    }
}
