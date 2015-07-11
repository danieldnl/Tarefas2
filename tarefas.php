<?php 
    
session_start();

include_once 'classes/Tarefa.php';
include_once 'classes/CrudTarefa.php';

if (isset($_POST['titulo']) && $_POST['titulo'] != '') {
    $tarefa = new Tarefa();
    $tarefa->setTitulo($_POST['titulo']);
    
    if (isset($_POST['prazo'])) {
        $tarefa->setPrazo($_POST['prazo']);
    }else{
        $tarefa->setPrazo('');
    }
    
    $tarefa->setPrioridade($_POST['prioridade']);
    
    if (isset($_POST['concluida'])) {
        $tarefa->setConcluida(1);
    }else{
        $tarefa->setConcluida(0);
    }
    
    if (isset($_POST['lembrete'])) {
        $tarefa->setLembrete(1);
    }else{
        $tarefa->setLembrete(0);
    }
    
    $listaTarefas = new CrudTarefa();
    $listaTarefas->InserirTarefa($tarefa);
    header('Location: tarefas.php');
    die();
}

$id = '';
$titulo = '';
$prazo = '';
$prioridade = '';
$concluida = '';
$lembrete = '';
$btnValor = 'Cadastrar';
include 'template.php';

?>
