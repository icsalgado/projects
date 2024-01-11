<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>
<body>

    <div>
        <br>
        <a href='./addProductPage.php'>
        <button type="button" class="btn btn-primary">Adicionar Produto</button>
        </a>
        <br><br>
    </div>

    <?php
        require './conn.php';

        $product = [];

        $sql = $pdo->query('SELECT prod_name, prod_brand, sm_name, sm_prodPrice FROM Product INNER JOIN Supermarket on prod_id = sm_product ORDER BY prod_name');
        if($sql->rowCount() > 0){//verifica se tem usuario cadastrado
            $product = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    ?>
    <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
        <th>Produto</th>
        <th>Marca</th>
        <th>Mercado</th>
        <th>Preço</th>
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
                        <a href="#">[Editar]</a> 
                        <a href="#">[Excluir]</a>
                    </td>';
                echo '</tr>';
            }
        ?>
    </tbody>
    </table>
</body>
</html>