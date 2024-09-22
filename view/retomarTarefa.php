<?php
    require_once("../db/conexao.php");

    $sql = "SELECT * FROM tarefas";
    $dadosTarefas = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retomar Tarefa</title>
</head>
<body>
    <h2>Retomar Tarefa</h2> <br>

    <Form action="" method="post">
        <label for="">Selecione a Tarefa:</label>
        <select name="idtarefa"  id="">
            <?php foreach($dadosTarefas as $tarefas){ ?>
                <option value="<?php echo $tarefas['id_tarefa']?>"><?php echo $tarefas['nome_tarefa']?></option>
            <?php } ?>
        </select> <br>
        <label for="">Data e Hora:</label>
            <input type="datetime-local" name="datahoraRet" id="datahoraRet"> <br>
        <input type="submit" value="Retomar Tarefa">
    </Form>

</body>
</html>