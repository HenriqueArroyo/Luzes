<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Patrimônio</title>
</head>
<body>
    <h1>Cadastro de Patrimônio</h1>
    <form method="POST" action="processa_cadastro_patrimonio.php">
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" required><br>

        <label for="item">Item:</label>
        <input type="text" id="item" name="item" required><br>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Ativo">Ativo</option>
            <option value="Inativo">Inativo</option>
        </select><br>

        <label class="input-group-text" for="inputGroupSelectSala">Sala:</label>
<select class="form-select" id="id_sala" name="id_sala">
    <option selected>Escolha a Sala</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
</select>
        <br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
