<?php
    require_once("../db/conexao.php");

    if(isset($_GET['erro'])){
        if($_GET['erro'] == 1){
            $erro = "Categoria Cadastrado com sucesso!";
        } else if($_GET['erro'] == 2){
            $erro = "Erro: Categoria não cadastrado!";
        }
    } else {
        $erro = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/estilos/style.css">
    <title>Cadastro de Categoria</title>
</head>
<body>

<form action="../db/cad_Categoria.php" method="post">
    <h1>Cadastrar Categoria</h1> <br>
        <label for="">Nome: </label>
        <input type="text" name ="categoria"> <br>
        <span><?php echo $erro ?></span> <br>
        <input type="button" value="Voltar" onclick="window.location.href='../view/home.php';">
        <input type="submit" value = "Cadastrar"name = "Cadastrar">
</form>

</body>
</html>