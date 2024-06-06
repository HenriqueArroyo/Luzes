<?php
require_once 'conectaBD.php';

if (!empty($_POST['email']) && !empty($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        // Verificar na tabela Responsavel
        $stmt = $pdo->prepare("SELECT ID_responsavel, NOME FROM Responsavel WHERE EMAIL = ? AND SENHA = ?");
        $stmt->execute([$email, $senha]);
        $responsavel = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($responsavel) {
            // Usuário é um responsável
            session_start();
            $_SESSION['usuario'] = $responsavel;
            header("Location: indexLog.php");
            exit;
        }

        // Verificar na tabela Funcionario
        $stmt = $pdo->prepare("SELECT ID_funcionario, NOME FROM Funcionario WHERE EMAIL = ? AND SENHA = ?");
        $stmt->execute([$email, $senha]);
        $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($funcionario) {
            // Usuário é um funcionário
            session_start();
            $_SESSION['usuario'] = $funcionario;
            header("Location: indexLog.php");
            exit;
        }

        // Se não encontrou nenhum usuário com os dados fornecidos
        header("Location: login.php?msgErro=Email ou senha incorretos.");
        exit;
    } catch (PDOException $e) {
        // Em caso de erro
        echo "Erro: " . $e->getMessage();
        die();
    }
} else {
    // Se os campos estiverem vazios
    header("Location: login.php?msgErro=Por favor, preencha todos os campos.");
    exit;
}
?>
