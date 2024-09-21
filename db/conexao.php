<?php

//Conexão com o Banco de Dados
$host = "localhost";
$user = "root";
$senha = "179026";
$banco = "controleTarefas";

$conn = new mysqli($host, $user, $senha, $banco);

//Verifica se há erro na conexão com o banco
if($conn->connect_errno){
    echo "erro na conexão <br>";
    echo "erro: " . mysqli_connect_erro();
}

?>