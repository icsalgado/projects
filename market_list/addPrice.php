<?php
    require './conn.php';//chama a conexão do banco

    $prod_id = (int)$_POST['products'];
    $mkt_id = (int)$_POST['market'];
    $price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
    $notes = ucwords(strtolower(filter_input(INPUT_POST,'notes', FILTER_SANITIZE_SPECIAL_CHARS)));

    $sql = $pdo->query("INSERT INTO Price (pr_prod_id, pr_mkt_id, pr_price, pr_notes) VALUES ('$prod_id', '$mkt_id', '$price', '$notes')");
   
    header('Location: addProductPage.php');
    exit;
?>