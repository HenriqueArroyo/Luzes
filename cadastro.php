<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $id_responsavel = $_POST['id_responsavel'];
    $id_sala = $_POST['id_sala'];

    $data = [
        'NOME' => $nome,
        'EMAIL' => $email,
        'SENHA' => $senha,
        'ID_responsavel' => $id_responsavel,
        'ID_sala' => $id_sala
    ];

    $url = 'http://localhost/api/api_funcionario.php'; // substitua pela URL correta da sua API

    $options = [
        'http' => [
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data),
        ],
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) { /* Handle error */ }

    // Decodifica a resposta
    $response = json_decode($result, true);

    header("Location: index.php?msgSucesso=Cadastro de funcionário realizado com sucesso!");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Funcionário</title>
    <link rel="stylesheet" href="css/styleCadastro.css">
</head>
<body>
    <h1>Registrar Novo Funcionário</h1>
    <form action="cadastro.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>

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
