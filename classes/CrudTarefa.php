<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CrudTarefa
 *
 * @author Daniel
 */
include_once 'ConexaoBD.php';
include_once 'Tarefa.php';

class CrudTarefa {

    private $tarefa;
    private $Lista_tarefas;

    public function InserirTarefa(Tarefa $tarefa) {
        $prazo = implode('-', array_reverse(explode('/', $tarefa->getPrazo())));
        $sql = "INSERT INTO tarefas (titulo, prazo, prioridade, concluida, lembrete) VALUES(
            '{$tarefa->getTitulo()}',
            '{$prazo}',
            '{$tarefa->getPrioridade()}',
            '{$tarefa->getConcluida()}',
            '{$tarefa->getLembrete()}'
        )";
        $conexao = new ConexaoBD();
        $conexao->executarSQL($sql);
        $conexao->desconectar();
    }

    public function AtualizarTarefa(Tarefa $tarefa, $tarefaId) {
        $prazo = implode('-', array_reverse(explode('/', $tarefa->getPrazo())));
        $sql = "UPDATE tarefas SET 
            titulo = '{$tarefa->getTitulo()}',
            prazo = '{$prazo}',
            prioridade = '{$tarefa->getPrioridade()}',
            concluida = '{$tarefa->getConcluida()}',
            lembrete = '{$tarefa->getLembrete()}'
            WHERE id = {$tarefaId}
        ";
        $conexao = new ConexaoBD();
        $conexao->executarSQL($sql);
        $conexao->desconectar();
    }

    public function DeletarTarefa($tarefaId) {
        $sql = "DELETE FROM tarefas WHERE id = {$tarefaId}";
        $conexao = new ConexaoBD();
        $conexao->executarSQL($sql);
        $conexao->desconectar();
    }

    public function ListarTarefa($tarefaId) {
        $sql = "SELECT * FROM tarefas WHERE id = {$tarefaId}";
        $conexao = new ConexaoBD();
        $rs = $conexao->executarSQL($sql);
        while ($row = mysqli_fetch_array($rs)) {
            $tarefa = new Tarefa();
            $tarefa->setId($row['id']);
            $tarefa->setTitulo($row['titulo']);

            $prazo = implode('/', array_reverse(explode('-', $row['prazo'])));
            $tarefa->setPrazo($prazo);

            $prioridade = $tarefa->traduz_prioridade($row['prioridade']);
            $tarefa->setPrioridade($prioridade);

            $concluida = $tarefa->traduz_booleano($row['concluida']);
            $tarefa->setConcluida($concluida);

            $lembrete = $tarefa->traduz_booleano($row['lembrete']);
            $tarefa->setLembrete($lembrete);
            $conexao->desconectar();
            
            return $tarefa;
        }
    }

    public function ListarTarefas() {
        $arrTarefas = array();
        $i = 0;
        $sql = "SELECT * FROM tarefas order by id";

        $conexao = new ConexaoBD();
        $rs = $conexao->executarSQL($sql);

        while ($row = mysqli_fetch_array($rs)) {
            $tarefa = new Tarefa();
            $tarefa->setId($row['id']);
            $tarefa->setTitulo($row['titulo']);

            $prazo = implode('/', array_reverse(explode('-', $row['prazo'])));
            $tarefa->setPrazo($prazo);

            $prioridade = $tarefa->traduz_prioridade($row['prioridade']);
            $tarefa->setPrioridade($prioridade);

            $concluida = $tarefa->traduz_booleano($row['concluida']);
            $tarefa->setConcluida($concluida);

            $lembrete = $tarefa->traduz_booleano($row['lembrete']);
            $tarefa->setLembrete($lembrete);

            $arrTarefas[$i] = $tarefa;
            $i++;
        }

        $conexao->desconectar();
        return $arrTarefas;
    }

}

?>
