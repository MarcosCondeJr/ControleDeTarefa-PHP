<?php

session_start();

require_once("../db/conexao.php");

$idtarefa = $_POST['idtarefa'];

//Verifica se tarefa já foi Iniciada
$verificaStatusIni = "SELECT * FROM tarefas_iniciadas WHERE id_tarefa = $idtarefa";
$resultadoIni = mysqli_query($conn,$verificaStatusIni);
$tarefaini = mysqli_fetch_assoc($resultadoIni);

//Verifica se tarefa já foi Finalizada
$verificaStatusfin = "SELECT * FROM tarefas_finalizadas WHERE id_tarefa = $idtarefa";
$resultadoFin = mysqli_query($conn,$verificaStatusfin);
$tarefafin = mysqli_fetch_assoc($resultadoFin);

//Verifica se tem data de Finalização
if($tarefafin){
    if(!empty($tarefafin['datahora_final'])){
        header('location: ../view/finalizarTarefa.php?erro=3');
    }
} else if($tarefaini){
    if(!empty($tarefaini['datahora_inicio'])){
        //Finaliza a tarefa
        $id_tarefa = $_POST['idtarefa'];
        $dataHoraFin = $_POST['datahorafin'];

        $sql = "INSERT INTO 
                    tarefas_finalizadas(id_tarefa,datahora_final)
                    VALUE($id_tarefa,'$dataHoraFin')    
        ";

        $resultado = mysqli_query($conn,$sql);

            if($resultado == true){
                $_SESSION['tarefafin'] = $id_tarefa;
                $_SESSION['datahorafin'] = $dataHoraFin;
                header('location: ../view/finalizarTarefa.php?erro=2');
            }  
    }
} else {
    header('location: ../view/finalizarTarefa.php?erro=1');
}



