<?php
    require './conn.php';//chama a conexão do banco

    $sm_name = ucwords(strtolower(filter_input(INPUT_POST,'sm_name', FILTER_SANITIZE_SPECIAL_CHARS)));//validação do campo
    $sm_notes = ucwords(strtolower(filter_input(INPUT_POST,'sm_notes', FILTER_SANITIZE_SPECIAL_CHARS)));
    $sm_prodPrice = filter_input(INPUT_POST,'sm_prodPrice', FILTER_VALIDATE_FLOAT);
    $sm_product = $pdo->query("SELECT max(prod_id) FROM Product")->fetchColumn(); //->fetchColumn() vai trazer a proxima coluna, ou seja, o valor desejado

    $sql = $pdo->query("INSERT INTO Supermarket (sm_name, sm_product, sm_prodPrice, sm_notes) VALUE ('$sm_name', '$sm_product', '$sm_prodPrice', '$sm_notes')");//esta é a forma não tão segura para ataques via formulário usando para testar as telas e queries
    
    header('Location: index.php');
    exit;
?>