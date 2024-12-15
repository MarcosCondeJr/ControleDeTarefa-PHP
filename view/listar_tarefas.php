<?php
    include '../db/listar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/estilos/estilizacao.css">
    <title>Tarefas</title>
</head>
<body>
    <h1>Tarefas</h1>
    
    <table border="1">
        <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>Responsavél</td>
            <td>Categoria</td>
            <td>Descrição</td>
            <td>Inicio<br>Data/hora </td>
            <td>Pausa<br>Data/hora </td></td>
            <td>Retomada<br> Data/hora</td>
            <td>Finzalido<br> Data/hora</td>
            <td>Status/<br>Tempo Gasto</td>
        </tr>
        <?php foreach($listTarefas as $tarefas) { 
            // Cálculo do tempo gasto por tarefa
            $dataHoraInicio = $tarefas['datahora_inicio'];
            $dataHoraPause = $tarefas['datahora_pause'];
            $dataHoraRetomar = $tarefas['datahora_retomar'];
            $dataHoraFinal = $tarefas['datahora_final'];

            $meses = null;
            $dias = null;
            $minutos = null;
            $horas = null;
            $tempoGasto = "";

            if (!empty($dataHoraInicio) && !empty($dataHoraFinal)) {
                $datetime_inicio = new DateTime($dataHoraInicio);

                if (!empty($dataHoraPause) && !empty($dataHoraRetomar)) {
                    $datetime_pause = new DateTime($dataHoraPause);
                    $datetime_retomar = new DateTime($dataHoraRetomar);
                    $datetime_final = new DateTime($dataHoraFinal);

                    // Cálculo de tempo entre início e pausa
                    $interval_inicio_pause = $datetime_inicio->diff($datetime_pause);

                    // Cálculo de tempo entre retomada e hora final
                    $interval_retomar_final = $datetime_retomar->diff($datetime_final);

                    $meses = $interval_inicio_pause->m + $interval_retomar_final->m;
                    $dias = $interval_inicio_pause->d + $interval_retomar_final->d;
                    $horas = $interval_inicio_pause->h + $interval_retomar_final->h;
                    $minutos = $interval_inicio_pause->i + $interval_retomar_final->i;

                    $tempoGasto = "$meses mêses, $dias dias, $horas horas, $minutos minutos";
                } else {
                    $tempoGasto = "$meses mêses, $dias dias, $horas horas, $minutos minutos";
                }
            } else if (empty($dataHoraInicio)){
                $tempoGasto = "Não Iniciada";    
            } else if (!empty($dataHoraPause)){
                $tempoGasto = "Pausada";
            } else {
                $tempoGasto = "Em Andamento";
            }
        ?>
        <tr>
            <td><?php echo $tarefas['id_tarefa']?></td>
            <td><?php echo $tarefas['nome_tarefa']?></td>
            <td><?php echo $tarefas['nome']?></td>
            <td><?php echo $tarefas['nome_categoria']?></td>
            <td><?php echo $tarefas['descricao']?></td>
            <td>
                <?php if(!empty($tarefas['datahora_inicio'])){ 
                echo date('d/m/y H:i:s', strtotime($tarefas['datahora_inicio']));
                }?>
            </td>
            <td>
                <?php if(!empty($tarefas['datahora_pause'])){ 
                echo date('d/m/y H:i:s', strtotime($tarefas['datahora_pause']));
                }?>
            </td>
            <td>
                <?php if(!empty($tarefas['datahora_retomar'])){ 
                echo date('d/m/y H:i:s', strtotime($tarefas['datahora_retomar']));
                }?>
            </td>
            <td>
                <?php if(!empty($tarefas['datahora_final'])){ 
                echo date('d/m/y H:i:s', strtotime($tarefas['datahora_final']));
                }?>
            </td>
            <td><?php echo $tempoGasto; ?></td>
        </tr>
        <?php } ?>
    </table> <br>
    <input type="button" value="Voltar" onclick="window.location.href='../view/home.php';">
</body>
</html>