<?php

session_start();
include_once 'classes/Tarefa.php';
include_once 'classes/CrudTarefa.php';

if (isset($_POST['titulo']) && $_POST['titulo'] != '') {
    $tarefa = new Tarefa();
    $tarefa->setTitulo($_POST['titulo']);

    if (isset($_POST['prazo'])) {
        $tarefa->setPrazo($_POST['prazo']);
    } else {
        $tarefa->setPrazo('');
    }

    $tarefa->setPrioridade($_POST['prioridade']);

    if (isset($_POST['concluida'])) {
        $tarefa->setConcluida(1);
    } else {
        $tarefa->setConcluida(0);
    }

    if (isset($_POST['lembrete'])) {
        $tarefa->setLembrete(1);
    } else {
        $tarefa->setLembrete(0);
    }
    
    $atualizar = new CrudTarefa();
    $atualizar->AtualizarTarefa($tarefa, $_POST['id']);
    header('Location: tarefas.php');
    die();
}

$listarTarefa = new CrudTarefa();
$tarefaRetornada = $listarTarefa->ListarTarefa($_GET['id']);
$id = $tarefaRetornada->getId();
$titulo = $tarefaRetornada->getTitulo();
$prazo = $tarefaRetornada->getPrazo();
$prioridade = $tarefaRetornada->getPrioridade();
$concluida = $tarefaRetornada->getConcluida();
$lembrete = $tarefaRetornada->getLembrete();
$btnValor = 'Editar';

include 'template.php';


