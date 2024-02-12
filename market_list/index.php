<!DOCTYPE php>

<?php
    require './conn.php';

    $product = [];

    $sql = $pdo->query('SELECT prod_name, prod_brand, mkt_name, pr_price, pr_notes FROM Products AS p INNER JOIN Price AS pr ON p.prod_id = pr.pr_prod_id INNER JOIN Market AS m ON pr.pr_mkt_id = m.mkt_id INNER JOIN (SELECT pr.pr_prod_id, MIN(pr.pr_price) AS min_price FROM Price AS pr GROUP BY pr.pr_prod_id) AS min_prices ON pr.pr_prod_id = min_prices.pr_prod_id AND pr.pr_price = min_prices.min_price ORDER BY mkt_name');
    
    if($sql->rowCount() > 0){
        $product = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>
<body>
    <h1>Lista de mercado com melhores preços</h1>
    
    <div class="row" style="float: right; margin-right: 10px;">
        <form method="get" action="searchProduct.php" >
            <input type="text" name="searched">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>

    <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
        <th>Produto</th>
        <th>Marca</th>
        <th>Mercado</th>
        <th>Preço</th>
        <th>OBS</th>
        </tr>
    </thead>
    <tbody>
        <?php //para cada item do array de fora, cria uma linha
            foreach ($product as $rows) {
                    echo '<tr>';
                    foreach ($rows as $info) { //para cada item do array de dentro cria uma coluna
                        echo '<td>' . $info . '</td>';
                }
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