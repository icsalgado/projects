<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>Adicionar Produto</h2><br>
    
    <div> 
        <form method="POST" action="addProduct.php">
 
            <p>Produto:</p> 
            <input type="text" name="prod_name"/>
            <p>Marca: </p>
            <input type="text" name="prod_brand"/>
            <p>Setor:</p>
            <input type="text" name="prod_sector"/>
            <br><br><p><input type="submit" value="Próximo" /></p>
                
        </form>
    </div>
</body>
</html>