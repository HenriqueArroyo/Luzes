<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Função para realizar uma requisição HTTP GET
    function http_get($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }

    // URL da API do Funcionario e Responsavel (ajustar de acordo com seu ambiente)
    $funcionario_api_url = 'http://localhost/api/api_funcionario.php?email=' . urlencode($email);
    $responsavel_api_url = 'http://localhost/api/api_responsavel.php?email=' . urlencode($email);

    // Realiza a requisição para API de Funcionario
    $funcionario_data = http_get($funcionario_api_url);

    // Se não encontrar funcionário, tenta buscar na API de Responsavel
    if (empty($funcionario_data)) {
        $responsavel_data = http_get($responsavel_api_url);
        if (!empty($responsavel_data) && isset($responsavel_data['SENHA']) && password_verify($senha, $responsavel_data['SENHA'])) {
            $_SESSION['user'] = [
                'type' => 'responsavel',
                'data' => $responsavel_data
            ];
            header('Location: dashboard.php');
            exit;
        } else {
            $error = "Email ou senha incorretos!";
        }
    } else {
        // Encontrou funcionário, verifica senha
        if (isset($funcionario_data['SENHA']) && password_verify($senha, $funcionario_data['SENHA'])) {
            $_SESSION['user'] = [
                'type' => 'funcionario',
                'data' => $funcionario_data
            ];
            header('Location: indexLog.php');
            exit;
        } else {
            $error = "Email ou senha incorretos!";
        }
    }

    // Se chegou aqui, login falhou
    if (!isset($error)) {
        $error = "Email ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <?php if (isset($error)): ?>
    <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>

</html>