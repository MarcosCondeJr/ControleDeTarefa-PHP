<?php

require_once ("../db/conexao.php");

session_start();

$idtarefa = $_POST['idtarefa'];

//Verifica se tarefa foi Pausada
$verificaStatusPause = "SELECT * FROM tarefas_pause WHERE id_tarefa = $idtarefa";
$resultadoPause = mysqli_query($conn,$verificaStatusPause);
$tarefaPause = mysqli_fetch_assoc($resultadoPause);

//Verifica se tarefa já foi Finalizada
$verificaStatusfin = "SELECT * FROM tarefas_finalizadas WHERE id_tarefa = $idtarefa";
$resultadoFin = mysqli_query($conn,$verificaStatusfin);
$tarefafin = mysqli_fetch_assoc($resultadoFin);

//Verifica se a tarefa já foi finalizada
if ($tarefafin && !empty($tarefafin['datahora_final'])) {
    header('location: ../view/retomarTarefa.php?erro=2');
    exit();
}

//Verifica se a tarefa foi Pausada
if (!$tarefaPause && empty($tarefaPause['datahora_pause'])) {
    header('location: ../view/retomarTarefa.php?erro=1');
    exit();
}

$dataHoraRet = $_POST['datahoraRet'];
    $sql = "INSERT INTO tarefas_retomar (id_tarefa,datahora_retomar)
            VALUES ($idtarefa, '$dataHoraRet')";
    
    $resultado = mysqli_query($conn, $sql);
    
        if ($resultado == true) {
            header('location: ../view/retomarTarefa.php?erro=3');
            exit();
        }