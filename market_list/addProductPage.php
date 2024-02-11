<!DOCTYPE php>

<?php
    require './conn.php';

    $product = [];

    $sql = $pdo->query('SELECT * FROM Products ORDER BY prod_id DESC');
    
    if($sql->rowCount() > 0){
        $product = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    $market = [];

    $sql = $pdo->query('SELECT * FROM Market');
    
    if($sql->rowCount() > 0){
        $market = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
    <div>
        <h2>Adicionar Informações <a href="./index.php"><img src="./back.png" width=20></a></h2>
        <br>
        <form method="POST" action="addProduct.php">

            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Produto" name="prod_name"/>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Marca" name="prod_brand"/>
                </div>
                <div class="col">
                    <p><input class="btn btn-primary" type="submit" value="Cadastrar produto" /></p>
                </div>
            </div>
        </form>
        <form method="POST" action="addMarket.php">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Mercado" name="mkt_name"/>
                </div>
                <div class="col">
                    <p><input class="btn btn-secondary" type="submit" value="Cadastrar mercado" /></p>
                </div>
            </div>
        </form>
        <form method="POST" action="addPrice.php">
            <div class="row">
                <div class="col">
                    <select name="products">
                        <?php //para cada item do array de fora, cria uma linha
                            foreach ($product as $rows) {
                                echo '<option value=' . $rows['prod_id'] . '>' . $rows['prod_name'] . " " . $rows['prod_brand'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <select name="market">
                        <?php //para cada item do array de fora, cria uma linha
                            foreach ($market as $rows) {
                                echo '<option value=' . $rows['mkt_id'] . '>' . $rows['mkt_name'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Observações" name="notes"/>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Preço" name="price"/>
                </div>
                <div class="col">
                    <p><input class="btn btn-success" type="submit" value="Cadastrar Preço" /></p>
                </div>
            </div>
        </form>
    </div>
    <div>
        <h2>Mercados</h2>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                <th></th>
                <th>Mercado</th>
                </tr>
            </thead>
            <tbody>
                <?php //para cada item do array de fora, cria uma linha
                    foreach ($market as $rows) {
                            echo '<tr>';
                            foreach ($rows as $info) { //para cada item do array de dentro cria uma coluna
                                echo '<td>' . $info . '</td>';
                        }
                    }
                ?>
            </tbody>
        </table>

        <h2>Produtos</h2>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                <th></th>
                <th>Produto</th>
                <th>Marca</th>
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
    </div>
</body>
</html>