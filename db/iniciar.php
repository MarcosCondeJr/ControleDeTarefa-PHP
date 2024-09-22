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

//Verifica se a tarefa já foi Iniciada
if($tarefaini){
    if(!empty($tarefaini['datahora_inicio'])){
        header('location: ../view/iniciarTarefa.php?erro=6');
    }
}else if($tarefafin){
    //Verifica se já foi Finalizada
    if(!empty($tarefafin['datahora_final'])){
        header('location: ../view/iniciarTarefa.php?erro=4');
    }
} else {
    //Inicia a tarefa
        $id_tarefa = $_POST['idtarefa'];
        $dataHoraIni = $_POST['datahoraIni'];

        $sql = "INSERT INTO 
                    tarefas_iniciadas(id_tarefa,datahora_inicio)
                    VALUE($id_tarefa,'$dataHoraIni')
        ";

        $resultado = mysqli_query($conn,$sql);

        if($resultado == true){
            $_SESSION['idtarefa'] = $id_tarefa;
            $_SESSION['dataHoraIni'] = $dataHoraIni;
            header('location: ../view/iniciarTarefa.php?erro=5');
        }
}
 


