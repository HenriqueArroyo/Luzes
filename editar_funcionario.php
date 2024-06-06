<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
</head>
<body>
    <h1>Editar Funcionário</h1>

    <?php
    // Verifica se foi fornecido um ID de funcionário na URL
    if (!isset($_GET['id'])) {
        echo "ID do funcionário não fornecido.";
        exit;
    }

    // Obtém o ID do funcionário da URL
    $id_funcionario = $_GET['id'];

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Processa os dados do formulário de edição aqui
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $id_responsavel = $_POST['id_responsavel'];
        $id_sala = $_POST['id_sala'];

        // Atualiza os dados do funcionário no banco de dados
        $sql = "UPDATE Funcionario SET NOME = :nome, EMAIL = :email, SENHA = :senha, ID_responsavel = :id_responsavel, ID_sala = :id_sala WHERE ID_funcionario = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nome' => $nome,
            'email' => $email,
            'senha' => $senha,
            'id_responsavel' => $id_responsavel,
            'id_sala' => $id_sala,
            'id' => $id_funcionario
        ]);

        echo "Funcionário atualizado com sucesso.";
    } else {
        // Se o formulário não foi enviado, exibe o formulário de edição preenchido com os dados do funcionário

        // Consulta SQL para obter os dados do funcionário com base no ID fornecido
        $sql = "SELECT * FROM Funcionario WHERE ID_funcionario = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id_funcionario]);
        $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se o funcionário foi encontrado
        if (!$funcionario) {
            echo "Funcionário não encontrado.";
            exit;
        }
    ?>
    
    <form method="POST">
        <!-- Campos do formulário preenchidos com os dados do funcionário -->
        <input type="text" name="nome" value="<?php echo $funcionario['nome']; ?>" placeholder="Nome" required><br>
        <input type="email" name="email" value="<?php echo $funcionario['email']; ?>" placeholder="Email" required><br>
        <input type="password" name="senha" placeholder="Nova Senha"><br>
        <!-- Adicione os campos restantes conforme necessário -->
        <input type="text" name="id_responsavel" value="<?php echo $funcionario['id_responsavel']; ?>" placeholder="ID Responsável" required><br>
        <input type="text" name="id_sala" value="<?php echo $funcionario['id_sala']; ?>" placeholder="ID Sala" required><br>
        <!-- Adicione mais campos conforme necessário -->
        <input type="submit" value="Salvar">
    </form>

    <?php } ?>
</body>
</html>
