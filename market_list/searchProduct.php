<!DOCTYPE php>

<?php
    require './conn.php';

    $string = $_GET['searched'];

    $searched = "%".$string."%";

    $product = [];

    $sql = $pdo->query('SELECT prod_name, prod_brand, mkt_name, pr_price, pr_notes FROM Products AS p INNER JOIN Price AS pr ON p.prod_id = pr.pr_prod_id INNER JOIN Market AS m ON pr.pr_mkt_id = m.mkt_id where prod_name LIKE "' . $searched . '" ORDER BY prod_name');
    
    if($sql->rowCount() > 0){
        $product = $sql->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $product = "Produto não encontrado";
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
        <th>Produto</th>
        <th>Marca</th>
        <th>Mercado</th>
        <th>Preço</th>
        <th>OBS</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <?php //para cada item do array de fora, cria uma linha
            foreach ($product as $rows) {
                    echo '<tr>';
                    foreach ($rows as $info) { //para cada item do array de dentro cria uma coluna
                        echo '<td>' . $info . '</td>';
                }
                echo '<td>    
                        <a href="./updatePrice.php"><img src="sync.png" width=30> </a> 
                    </td>';
                echo '</tr>';
            }
        ?>
    </tbody>
    </table>
</body>
</html>