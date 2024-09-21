<?php
    require_once("../db/conexao.php");

    //Busca os dados de Responsaveis e armazena em uma variavél    
    $sql_resp = "SELECT * FROM responsaveis";
    $dadosResponsavel = mysqli_query($conn, $sql_resp); 

    //Busca as categorias e armazena em uma variavél 
    $sql_cat = "SELECT * FROM categorias";
    $dadosCategoria = mysqli_query($conn, $sql_cat);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Tarefa</title>
</head>
<body>
    <h2>Cadastrar Tarefa</h2> <br>

    <form action="../db/cad_Tarefa.php" method="post">
        <label for="">Titulo:</label>
            <input type="text" name="nomeTarefa" id="nomeTarefa">
        <label for="">Responsável: </label>
            <select name="responsavel" id="">
                <?php foreach($dadosResponsavel as $responsaveis) {?>
                    <option value="<?php echo $responsaveis['id_responsavel']?>"><?php echo $responsaveis['nome']?></option>
                <?php } ?> 
            </select>   
        <label for="">Categoria: </label>
            <select name="categoria" id="">
                <?php foreach($dadosCategoria as $categoria) {?>
                    <option value="<?php echo $categoria['id_categoria']?>"><?php echo $categoria['nome_categoria']?></option>
                <?php } ?> 
            </select> <br>
        <label for="">Descrição:</label> <br>
            <textarea name="descricao" id=""></textarea> <br> 
        <input type="submit" value="Cadastrar">            
                
    </form>
</body>
</html>