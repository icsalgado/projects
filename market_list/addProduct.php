<?php
    require './conn.php';//chama a conexão do banco

    $prod_name = ucwords(strtolower(filter_input(INPUT_POST,'prod_name', FILTER_SANITIZE_SPECIAL_CHARS)));//validação do campo
    $prod_brand = ucwords(strtolower(filter_input(INPUT_POST,'prod_brand', FILTER_SANITIZE_SPECIAL_CHARS)));
    $prod_sector = ucwords(strtolower(filter_input(INPUT_POST,'prod_sector', FILTER_SANITIZE_SPECIAL_CHARS)));
    

    $sql = $pdo->query("INSERT INTO Product (prod_name, prod_brand, prod_sector) VALUE ('$prod_name', '$prod_brand', '$prod_sector')");//esta é a forma não tão segura para ataques via formulário usando para testar as telas e queries

    header('Location: addMarketPage.php');
    exit;
?>