<?php
    include '../db/listaResp.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/estilos/style.css">
    <title>Lista de Responsaveis</title>
</head>
<body>
    <h1>Responsáveis</h1>

    <table border ="1">
        <tr>
            <td>Id</td>
            <td>Nome</td>
        </tr>
        <?php foreach ($listResp as $responsaveis) { ?>
        <tr>
            <td><?php echo $responsaveis['id_responsavel']?></td>
            <td><?php echo $responsaveis['nome']?></td>
        </tr>
        <?php } ?>
    </table>
    <input type="button" value="Voltar" onclick="window.location.href='../view/home.php';">
</body>
</html>