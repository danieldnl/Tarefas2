<!--Tabela de exibição das tarefas-->

<?php include_once 'classes/CrudTarefa.php'; ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Tarefa</th>
            <th>Prazo</th>
            <th>Prioridade</th>
            <th>Concluída</th>
            <th>Lembrete</th>
            <th>Opções</th> 
        </tr>
    </thead>
    <?php 
        $listaTarefas = new CrudTarefa();
        $arrTarefa = $listaTarefas->ListarTarefas();
    ?>
    <tbody>
        <?php foreach ($arrTarefa as $tarefa) : ?>

                <tr>
                    <td><?php echo $tarefa->getTitulo(); ?></td>
                    <td><?php echo $tarefa->getPrazo(); ?></td>
                    <td><?php echo $tarefa->getPrioridade(); ?></td>
                    <td class="booleano"><?php echo $tarefa->getConcluida(); ?></td>
                    <td class="booleano"><?php echo $tarefa->getLembrete(); ?></td>
                    <td>
                        <div class="icones-editar-excluir">
                            <a href="editar.php?id=<?php echo $tarefa->getId(); ?>"><span class="glyphicon glyphicon-edit"></span></a>
                            <a href="remove.php?id=<?php echo $tarefa->getId(); ?>"><span class="glyphicon glyphicon-remove-circle"></span></a>
                        </div>
                    </td>
                    
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>
