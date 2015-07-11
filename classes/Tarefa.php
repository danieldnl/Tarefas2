<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tarefa
 *
 * @author Daniel
 */
class Tarefa {

    private $id;
    private $titulo;
    private $descricao;
    private $prazo;
    private $prioridade;
    private $concluida;
    private $lembrete;

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getPrazo() {
        return $this->prazo;
    }

    public function getPrioridade() {
        return $this->prioridade;
    }

    public function getConcluida() {
        return $this->concluida;
    }

    public function getLembrete() {
        return $this->lembrete;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setPrazo($prazo) {
        $this->prazo = $prazo;
    }

    public function setPrioridade($prioridade) {
        $this->prioridade = $prioridade;
    }

    public function setConcluida($concluida) {
        $this->concluida = $concluida;
    }

    public function setLembrete($lembrete) {
        $this->lembrete = $lembrete;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function traduz_prioridade($codigo) {
        $prioridade = '';
        switch ($codigo) {
            case 1:
                $prioridade = 'Baixa';
                break;
            case 2:
                $prioridade = 'Média';
                break;
            case 3:
                $prioridade = 'Alta';
                break;
        }
        return $prioridade;
    }

    function traduz_booleano($concluida) {
        if ($concluida == 1) {
            return 'Sim';
        }
        return 'Não';
    }

}

?>
