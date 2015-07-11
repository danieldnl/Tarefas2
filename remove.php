<?php

include_once 'classes/CrudTarefa.php';

$tarefa = new CrudTarefa();

$tarefa->DeletarTarefa($_GET['id']);

header('Location: tarefas.php');


?>
