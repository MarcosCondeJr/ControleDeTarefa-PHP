<?php

require_once ("conexao.php");

$nomeCat = $_POST['categoria'];

$sql = "INSERT INTO 
    categorias (nome_categoria)
    VALUE ('$nomeCat')
";

$resultado = mysqli_query($conn,$sql);

if($resultado == true){
    header('location: ../view/cadastrarCat.php?erro=1');
} else {
    header('location: ../view/cadastrarCat.php?erro=2');
}