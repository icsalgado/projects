<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>164 Collection</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>


<?php

    require './conn.php';
    
    $items = [];

    $sql = $pdo->query('SELECT * FROM colecao');
    if($sql->rowCount() > 0){//verifica se tem usuario cadastrado
        $items = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>


<body>
    <header>
        <h1>Coleção 164</h1>
    </header>

    <main>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Cor</th>
                </tr>
            </thead>
            <tbody>
                <?php //para cada item do array de fora, cria uma linha
                    foreach ($items as $rows) {
                        echo '<tr>';
                        foreach ($rows as $info) { //para cada item do array de dentro cria uma coluna
                            echo '<td>' . $info . '</td>';
                        }
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </main>

</body>
</html>