<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Função para autenticar usuário via API usando GET
    function autenticarUsuario($email, $senha) {
        $urlFuncionario = 'http://localhost/api/api_funcionario.php';
        $urlResponsavel = 'http://localhost/api/api_responsavel.php';

        // Função para fazer a requisição GET
        function fazerRequisicao($url) {
            $result = file_get_contents($url);
            return $result ? json_decode($result, true) : null;
        }

        // Tentativa de login como Funcionario
        $response = fazerRequisicao($urlFuncionario);
        if ($response) {
            foreach ($response as $funcionario) {
                if ($funcionario['EMAIL'] === $email && $funcionario['SENHA'] === $senha) {
                    return [
                        'tipo' => 'Funcionario',
                        'dados' => $funcionario
                    ];
                }
            }
        }

        // Tentativa de login como Responsavel
        $response = fazerRequisicao($urlResponsavel);
        if ($response) {
            foreach ($response as $responsavel) {
                if ($responsavel['EMAIL'] === $email && $responsavel['SENHA'] === $senha) {
                    return [
                        'tipo' => 'Responsavel',
                        'dados' => $responsavel
                    ];
                }
            }
        }

        return null;
    }

    // Autenticar o usuário
    $resultado = autenticarUsuario($email, $senha);

    if ($resultado) {
        session_start();
        $_SESSION['usuario'] = $resultado['dados'];
        $_SESSION['tipo_usuario'] = $resultado['tipo'];
        
        header('Location: indexLog.php?msgSucesso=!');
    } else {
        echo "Email ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styleCadastro.css">
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
