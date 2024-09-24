<?php
    require_once("../db/conexao.php");

    //Busca os dados de Responsaveis e armazena em uma variavél    
    $sql_resp = "SELECT * FROM responsaveis";
    $dadosResponsavel = mysqli_query($conn, $sql_resp); 

    //Busca as categorias e armazena em uma variavél 
    $sql_cat = "SELECT * FROM categorias";
    $dadosCategoria = mysqli_query($conn, $sql_cat);

    if(isset($_GET['erro'])){
        if($_GET['erro'] == 1){
            $erro = "Tarefa Cadastrada com sucesso!";
        }else if($_GET['erro'] == 2){
            $erro = "Erro, não foi possivel cadastrar a tarefa!";
        }
    }else{
        $erro = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/estilos/style.css">
    <title>Cadastrar Tarefa</title>
</head>
<body>
    <h1>Cadastrar Tarefa</h1> <br>

    <form action="../db/cad_Tarefa.php" method="post">
        <label for="">Titulo:</label>
            <input type="text" name="nomeTarefa" id="nomeTarefa"> <br>
        <label for="">Responsável: </label>
            <select name="responsavel" id="">
                <?php foreach($dadosResponsavel as $responsaveis) {?>
                    <option value="<?php echo $responsaveis['id_responsavel']?>"><?php echo $responsaveis['nome']?></option>
                <?php } ?> 
            </select>   <br>
        <label for="">Categoria: </label>
            <select name="categoria" id="">
                <?php foreach($dadosCategoria as $categoria) {?>
                    <option value="<?php echo $categoria['id_categoria']?>"><?php echo $categoria['nome_categoria']?></option>
                <?php } ?> 
            </select> <br> <br>
        <label for="">Descrição:</label> <br>
            <textarea name="descricao" id=""></textarea>  <br>
        <span><?php echo $erro ?></span> <br>
        <input type="button" value="Voltar" onclick="window.location.href='../view/home.php';">
        <input type="submit" value="Cadastrar">           
                
    </form>
</body>
</html>