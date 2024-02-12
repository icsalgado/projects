<!DOCTYPE php>

<?php
    require './conn.php';

    $pr_id = (int)$_GET['searched'];

    //var_dump($pr_id);die;

    $product = [];

    $sql = $pdo->query("SELECT prod_id, prod_name, prod_brand, mkt_name, pr_id, pr_price, pr_notes FROM Products AS p INNER JOIN Price AS pr ON p.prod_id = pr.pr_prod_id INNER JOIN Market AS m ON pr.pr_mkt_id = m.mkt_id where pr.pr_id = '$pr_id'");
    
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
        <h2>Atualiza produto <a href="./index.php"><img src="./back.png" width=30></a></h2>
    </div>

    <thead class="thead-dark">
        <tr>
        <th></th>
        <th>Produto</th>
        <th>Marca</th>
        <th>Mercado</th>
        <th></th>
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

    <form method="POST" action="updateProduct.php">

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="prod_name" value="<?php echo isset($product[0]['prod_name']) ? $product[0]['prod_name'] : ''; ?>"/>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="prod_brand" value="<?php echo isset($product[0]['prod_brand']) ? $product[0]['prod_brand'] : ''; ?>"/>
            </div>
            <div class="col">
                <p><input class="btn btn-primary" type="submit" value="Atualizar produto" /></p>
            </div>
            <input type="hidden" name="prod_id" value="<?php echo isset($product[0]['prod_id']) ? $product[0]['prod_id'] : ''; ?>">
        </div>
    </form>
    <form method="POST" action="updatePrice.php">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" value="<?php echo isset($product[0]['pr_notes']) ? $product[0]['pr_notes'] : ''; ?>" name="notes"/>
                </div>
                <div class="col">
                    <input type="text" class="form-control" value="<?php echo isset($product[0]['pr_price']) ? $product[0]['pr_price'] : ''; ?>" name="price"/>
                </div>                
                <div class="col">
                    <p><input class="btn btn-success" type="submit" value="Atualizar Preço" /></p>
                </div>
                <input type="hidden" name="pr_id" value="<?php echo isset($product[0]['pr_id']) ? $product[0]['pr_id'] : ''; ?>">
            </div>
        </form>
</body>
</html>