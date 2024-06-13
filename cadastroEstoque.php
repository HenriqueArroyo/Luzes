<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Item no Estoque</title> 
    <link rel="stylesheet" href="css/styleCadastro.css">

</head>
<body>
    <h2>Cadastro de Item no Estoque</h2>
    <form action="processa_cadastro_estoque.php" method="post">
        <label for="item">Item:</label>
        <input type="text" id="item" name="item" required><br><br>
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required><br><br>
        <label class="input-group-text" for="inputGroupSelectSala">Sala:</label>
<select class="form-select" id="sala" name="sala">
    <option selected>Escolha a Sala</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
</select>
        <br><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
