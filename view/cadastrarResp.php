<?php
    require_once("../db/conexao.php");

    if(isset($_GET['erro'])){
        if($_GET['erro'] == 1){
            $erro = "Responsável Cadastrado!";
        } else if($_GET['erro'] == 2){
            $erro = "Responsável não cadastrado!";
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
    <title>Cadastrar Responsável</title>
</head>
<body>
    <form action="../db/cad_Responsavel.php" method="post">
        <h2>Cadastro de Responsavél</h2> <br>
        <label for="">Nome: </label>
        <input type="text" name ="responsavel"> <br>
        <span><?php echo $erro ?></span> <br>
        <input type="submit" value = "Cadastrar"name = "Cadastrar"> <br>
        <a href="../view/home.php">Voltar</a>
    </form>
</body>
</html>