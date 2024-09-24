<?php

require_once("../db/conexao.php");

 $sql = "SELECT * FROM responsaveis
        ORDER BY responsaveis.id_responsavel
 ";

 $listResp = mysqli_query($conn, $sql);