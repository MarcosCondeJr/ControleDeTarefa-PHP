<?php

require_once ("conexao.php");

$nome = $_POST['responsavel'];

$sql = "INSERT INTO 
    responsaveis (nome)
    VALUE ('$nome')
";

$resultado = mysqli_query($conn,$sql);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($resultado == true){
        header('location: ../view/cadastrarResp.php?erro=1');
        exit();
    } else {
        header('location: ../view/cadastrarResp.php?erro=2');
        exit();
    }
}
