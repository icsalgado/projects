<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>
<body>

    <?php //esse array vai ser substituido pelos dados do banco
        $items = array(
            array('id' => 1, 'Marca' => 'Dodge', 'Modelo' => 'Hemi Challenger', 'Ano' => 1970, 'Cor' => 'Laranja'),
            array('id' => 2, 'Marca' => 'Mitsubishi', 'Modelo' => 'Eclipse Spider', 'Ano' => 2004, 'Cor' => 'Cinza'),
            array('id' => 3, 'Marca' => 'Buick ', 'Modelo' => 'Riviera', 'Ano' => 1964, 'Cor' => 'Preto')
        );
    ?>
    <table class="table table-bordered table-dark">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Produto</th>
        <th scope="col">Marca</th>
        <th scope="col">Setor</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">1</th>
        <td>ração super premium</td>
        <td>Purina one</td>
        <td>gato</td>
        </tr>
    </tbody>
    </table>
</body>
</html>