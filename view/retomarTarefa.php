<?php
    require_once("../db/conexao.php");

    $sql = "SELECT * FROM tarefas";
    $dadosTarefas = mysqli_query($conn,$sql);

    if(isset($_GET['erro'])){
        if($_GET['erro'] == 1){
            $erro = "Essa tarefa não foi pausada!";
        }else if($_GET['erro'] == 2){
            $erro = "Essa tarefa já foi finalizada!";
        }else if($_GET['erro'] == 3){
            $erro = "Tarefa Retomada!";
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
    <title>Retomar Tarefa</title>
</head>
<body>
    <h2>Retomar Tarefa</h2> <br>

    <Form action="../db/retomar.php" method="post">
        <label for="">Selecione a Tarefa:</label>
        <select name="idtarefa"  id="">
            <?php foreach($dadosTarefas as $tarefas){ ?>
                <option value="<?php echo $tarefas['id_tarefa']?>"><?php echo $tarefas['nome_tarefa']?></option>
            <?php } ?>
        </select> <br>
        <label for="">Data e Hora:</label>
            <input type="datetime-local" name="datahoraRet" id="datahoraRet"> <br>
        <span id="error"><?php echo $erro; ?></span> <br>    
        <input type="submit" value="Retomar Tarefa">
        <a href="../view/home.php">Voltar</a>
    </Form>

</body>
</html>