<?php

require_once("../db/conexao.php");

    //Pesquisa as tarefas e todas os dados delas.
    $sql = "SELECT tarefas.*, 
        responsaveis.nome, 
        categorias.nome_categoria, 
        tarefas_iniciadas.datahora_inicio, 
        tarefas_pause.datahora_pause,
        tarefas_retomar.datahora_retomar,
        tarefas_finalizadas.datahora_final
        FROM tarefas
        INNER JOIN responsaveis ON tarefas.id_responsavel = responsaveis.id_responsavel
        INNER JOIN categorias ON tarefas.id_categoria = categorias.id_categoria
        LEFT JOIN tarefas_iniciadas ON tarefas.id_tarefa = tarefas_iniciadas.id_tarefa
        LEFT JOIN tarefas_pause ON tarefas.id_tarefa = tarefas_pause.id_tarefa
        LEFT JOIN tarefas_retomar ON tarefas.id_tarefa = tarefas_retomar.id_tarefa
        LEFT JOIN tarefas_finalizadas ON tarefas.id_tarefa = tarefas_finalizadas.id_tarefa";

    $listTarefas = mysqli_query($conn, $sql);

    
   