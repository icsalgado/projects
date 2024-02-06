<?php
    require './conn.php';//chama a conexão do banco

    $mkt_name = ucwords(strtolower(filter_input(INPUT_POST,'mkt_name', FILTER_SANITIZE_SPECIAL_CHARS)));//validação do campo
     
    $sql = $pdo->query("INSERT INTO Market (mkt_name) VALUES ('$mkt_name')");//esta é a forma não tão segura para ataques via formulário usando para testar as telas e queries

    header('Location: addProductPage.php');
    exit;
?>