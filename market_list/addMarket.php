<?php
    require './conn.php';//chama a conexão do banco

    $sm_name = ucwords(strtolower(filter_input(INPUT_POST,'sm_name', FILTER_SANITIZE_SPECIAL_CHARS)));//validação do campo
    $sm_prodPrice = filter_input(INPUT_POST,'sm_prodPrice', FILTER_VALIDATE_FLOAT);
    $sm_product = 

    print_r($sm_product);
    die();

    $sql = $pdo->query("INSERT INTO Supermarket (sm_name, sm_product, sm_prodPrice) VALUE ('$sm_name', '$sm_product', '$sm_prodPrice')");//esta é a forma não tão segura para ataques via formulário usando para testar as telas e queries
    
    header('Location: index.php');
    exit;
?>