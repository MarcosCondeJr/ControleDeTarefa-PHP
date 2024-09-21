<?php

require_once("conexao.php");

$id_cat = $_POST['categoria'];
$id_resp = $_POST['responsavel'];
$nomeTarefa = $_POST['nomeTarefa'];
$descricao = $_POST['descricao'];

$sql = "INSERT INTO 
            tarefas (id_categoria,id_responsavel,nome_tarefa,descricao)
            VALUES($id_cat,$id_resp,'$nomeTarefa','$descricao')
";

$resultado = mysqli_query($conn,$sql);

if($resultado == true){
    header('location: ../view/home.php');
}