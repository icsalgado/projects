<?php
    require './conn.php';//chama a conexão do banco

    $pr_notes = ucwords(strtolower(filter_input(INPUT_POST,'notes', FILTER_SANITIZE_SPECIAL_CHARS)));
    $pr_price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
    $pr_id = (int)$_POST['pr_id'];

    $sql = $pdo->query("UPDATE Price SET pr_notes = '$pr_notes', pr_price = $pr_price WHERE pr_id = $pr_id");

    header('Location: index.php');
    exit;
?>