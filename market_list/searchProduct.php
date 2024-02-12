<!DOCTYPE php>

<?php
    require './conn.php';

    $string = $_GET['searched'];

    $searched = "%".$string."%";

    $product = [];

    $sql = $pdo->query('SELECT pr_id, prod_name, prod_brand, mkt_name, pr_price, pr_notes FROM Products AS p INNER JOIN Price AS pr ON p.prod_id = pr.pr_prod_id INNER JOIN Market AS m ON pr.pr_mkt_id = m.mkt_id where prod_name LIKE "' . $searched . '" ORDER BY prod_name');
    
    if($sql->rowCount() > 0){
        $product = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>
<body>
<table class="table table-striped">

    <div>
        <h2>Busca produto <a href="./index.php"><img src="./back.png" width=30></a></h2>
    </div>

    <thead class="thead-dark">
        <tr>
        <th></th>
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
                        <a href="./updatePage.php?searched=' . $rows['pr_id'] . '"><img src="sync.png" width=30> </a> 
                    </td>';
                echo '</tr>';
            }
        ?>
    </tbody>
    </table>

    <div>
        <br>
        <a href='./addProductPage.php'>
        <button type="button" class="btn btn-primary">Adicionar informações</button>
        </a>
        <br><br>
    </div>
</body>
</html>