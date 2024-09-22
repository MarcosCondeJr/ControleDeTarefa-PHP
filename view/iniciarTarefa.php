<?php
    require_once("../db/conexao.php");

    $sql = "SELECT * FROM tarefas";
    $dadosTarefas = mysqli_query($conn,$sql);

    if(isset($_GET['erro'])){
        if($_GET['erro'] == 4){
            $erro = "A tarefa já foi finalizada!";
        }else if($_GET['erro'] == 5){
            $erro = "Tarefa Iniciada!";
        }else if($_GET['erro'] == 6){
            $erro = "A Tarefa já foi Iniciada!";
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
    <title>Iniciar Tarefa</title>
</head>
<body>
    <h2>Iniciar Tarefa</h2> <br>

    <Form action="../db/iniciar.php" method="post">
        <label for="">Selecione a Tarefa:</label>
        <select name="idtarefa"  id="">
            <?php foreach($dadosTarefas as $tarefas){ ?>
                <option value="<?php echo $tarefas['id_tarefa']?>"><?php echo $tarefas['nome_tarefa']?></option>
            <?php } ?>
        </select> <br>
        <label for="">Data e Hora:</label>
            <input type="datetime-local" name="datahoraIni" id="datahoraIni"> <br>
        <span id="error"><?php echo $erro; ?></span> <br>
        <input type="submit" value="Iniciar Tarefa">
    </Form>

</body>
</html>