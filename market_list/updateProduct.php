<?php
    require './conn.php';//chama a conexão do banco

    $prod_name = ucwords(strtolower(filter_input(INPUT_POST,'prod_name', FILTER_SANITIZE_SPECIAL_CHARS)));//validação do campo
    $prod_brand = ucwords(strtolower(filter_input(INPUT_POST,'prod_brand', FILTER_SANITIZE_SPECIAL_CHARS)));
    $prod_id = (int)$_POST['prod_id'];

    //var_dump($prod_id);die;

    $sql = $pdo->query("UPDATE Products SET prod_name = '$prod_name', prod_brand = '$prod_brand' WHERE prod_id = $prod_id");

    header('Location: index.php');
    exit;
?>