<?php

    require_once("conexao.php");

    session_start();

    $idtarefa = $_POST['idtarefa'];

    //Verifica se tarefa já foi Iniciada
    $verificaStatusIni = "SELECT * FROM tarefas_iniciadas WHERE id_tarefa = $idtarefa";
    $resultadoIni = mysqli_query($conn,$verificaStatusIni);
    $tarefaini = mysqli_fetch_assoc($resultadoIni);

    //Verifica se tarefa já foi Finalizada
    $verificaStatusfin = "SELECT * FROM tarefas_finalizadas WHERE id_tarefa = $idtarefa";
    $resultadoFin = mysqli_query($conn,$verificaStatusfin);
    $tarefafin = mysqli_fetch_assoc($resultadoFin);

    //Verifica se a tarefa já foi Iniciada
    if (!$tarefaini && empty($tarefaini['datahora_inicio'])) {
        header('location: ../view/pausarTarefa.php?erro=1');
        exit();
    }

    //Verifica se a tarefa já foi finalizada
    if ($tarefafin && !empty($tarefafin['datahora_final'])) {
        header('location: ../view/pausarTarefa.php?erro=2');
        exit();
    }
    
    $dataHoraPause = $_POST['datahoraPause'];
    $sql = "INSERT INTO tarefas_pause (id_tarefa, datahora_pause)
            VALUES ($idtarefa, '$dataHoraPause')";
    
    $resultado = mysqli_query($conn, $sql);
    
        if ($resultado == true) {
            header('location: ../view/pausarTarefa.php?erro=3');
            exit();
        }