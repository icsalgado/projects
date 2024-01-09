<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>

    <?php
        require './conn.php';

        $product = [];

        $sql = $pdo->query('SELECT * FROM Product WHERE prod_id = (SELECT max(prod_id) FROM Product)');
        if($sql->rowCount() > 0){//verifica se tem usuario cadastrado
            $product = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    ?>

    <h2>Adicionar Mercado e preço</h2><br>
    
    <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
        <th>#</th>
        <th>Produto</th>
        <th>Marca</th>
        <th>Setor</th>
        </tr>
    </thead>
    <tbody>
        <?php //para cada item do array de fora, cria uma linha
            foreach ($product as $rows) {
                    echo '<tr>';
                    foreach ($rows as $info) { //para cada item do array de dentro cria uma coluna
                        echo '<td>' . $info . '</td>';
                }
                echo '</tr>';
            }
        ?>
    </tbody>
    </table>

    <div> 
        <form method="POST" action="addMarket.php">
 
            <p>Mercado: </p> 
            <input type="text" name="sm_name"/>
            <p>Preço: </p>
            <input type="text" name="sm_prodPrice"/>
            <br><br><p><input type="submit" value="Cadastrar" /></p>
                
        </form>
    </div>
</body>
</html>