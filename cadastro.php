<?php
require 'conectaBD.php';
// Configurações do banco de dados
$endereco = 'localhost';
$banco = 'luzes';
$usuario = 'postgres';
$senha = 'postgres';

try {
    // Conexão com o banco de dados
    $pdo = new PDO(
        "pgsql:host=$endereco;port=5432;dbname=$banco",
        $usuario,
        $senha,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );



} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados. <br/>";
    die($e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="/css/styleCadastro.css">

    <title>Cadastro de Funcionario</title>
</head>
<body>
    <h1>Cadastro de Funcionario</h1>
    <form method="POST" action="processa_cadastro.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone"><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha"> 

        <label class="input-group-text" for="inputGroupSelectResponsavel">Responsável:</label>
<select class="form-select" id="id_responsavel" name="id_responsavel">
    <option selected>Escolha o Responsavel</option>
    <option value="1">Henrique Arroyo</option>
    <option value="2">Eduardo Ananias</option>
    <option value="3">Leonardo Vitalino</option>
</select>

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


        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
