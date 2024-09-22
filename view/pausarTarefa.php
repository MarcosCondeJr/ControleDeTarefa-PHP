<?php
    require_once("../db/conexao.php");

    $sql = "SELECT * FROM tarefas";
    $dadosTarefas = mysqli_query($conn,$sql);

    if(isset($_GET['erro'])){
        if($_GET['erro'] == 1){
            $erro = "Essa tarefa ainda não foi iniciada!";
        }else if($_GET['erro'] == 2){
            $erro = "Essa tarefa já foi finalizada!";
        }else if($_GET['erro'] == 3){
            $erro = "Tarefa Pausada!";
        }else if($_GET['erro'] == 4){
            $erro = "Essa Tarefa já foi Pausada!";
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
    <title>Pausar Tarefa</title>
</head>
<body>
    <h2>Pausar Tarefa</h2> <br>

    <Form action="../db/pausar.php" method="post">
        <label for="">Selecione a Tarefa:</label>
        <select name="idtarefa"  id="">
            <?php foreach($dadosTarefas as $tarefas){ ?>
                <option value="<?php echo $tarefas['id_tarefa']?>"><?php echo $tarefas['nome_tarefa']?></option>
            <?php } ?>
        </select> <br>
        <label for="">Data e Hora:</label>
            <input type="datetime-local" name="datahoraPause" id="datahoraPause"> <br> 
        <span id="error"><?php echo $erro; ?></span> <br>     
        <input type="submit" value="Pausar Tarefa">
    </Form>

</body>
</html>