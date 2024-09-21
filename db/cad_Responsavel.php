<?php

require_once ("conexao.php");

$nome = $_POST['responsavel'];

$sql = "INSERT INTO 
    responsaveis (nome)
    VALUE ('$nome')
";

$resultado = mysqli_query($conn,$sql);

if($resultado == true){
    echo "Responsável Cadastrado";
}