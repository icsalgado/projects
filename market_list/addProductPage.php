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
            <p>Mercado:</p>
            <input type="text" name="prod_market"/>
            <p>Preço:</p>
            <input type="text" name="prod_price"/>
            <p>Observações: </p>
            <textarea name="prod_notes"></textarea>
            <br><br><p><input type="submit" value="Cadastrar" /></p>
                
        </form>
    </div>
</body>
</html>