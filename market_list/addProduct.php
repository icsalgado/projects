<?php
    require './conn.php';//chama a conexão do banco

    $prod_name = ucwords(strtolower(filter_input(INPUT_POST,'prod_name', FILTER_SANITIZE_SPECIAL_CHARS)));//validação do campo
    $prod_brand = ucwords(strtolower(filter_input(INPUT_POST,'prod_brand', FILTER_SANITIZE_SPECIAL_CHARS)));
    $prod_market = ucwords(strtolower(filter_input(INPUT_POST,'prod_market', FILTER_SANITIZE_SPECIAL_CHARS)));
    $prod_price = filter_input(INPUT_POST,'prod_price', FILTER_VALIDATE_FLOAT);
    $prod_notes = ucwords(strtolower(filter_input(INPUT_POST,'prod_notes', FILTER_SANITIZE_SPECIAL_CHARS)));
    

    $sql = $pdo->query("INSERT INTO ProductMarket (prod_name, prod_brand, prod_market, prod_price, prod_notes) VALUE ('$prod_name', '$prod_brand', '$prod_market', '$prod_price', '$prod_notes')");//esta é a forma não tão segura para ataques via formulário usando para testar as telas e queries

    header('Location: index.php');
    exit;
?>