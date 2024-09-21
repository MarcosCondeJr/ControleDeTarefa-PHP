<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Categoria</title>
</head>
<body>

<form action="../db/cad_Categoria.php" method="post">
    <h2>Cadastro de Categoria</h2> <br>
        <label for="">Nome: </label>
        <input type="text" name ="categoria"> <br>
        <input type="submit" value = "Cadastrar"name = "Cadastrar">
        <a href="../view/home.php">Voltar</a>
</form>

</body>
</html>