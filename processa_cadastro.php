<?php 
require_once 'conectaBD.php';

if (!empty($_POST)) {
    // Está chegando dados por POST e então posso tentar inserir no banco
    // Obter as informações do formulário ($_POST)
    try {
        // Preparar a SQL para inserção na tabela Funcionario
        $sql = "INSERT INTO Funcionario (NOME, EMAIL, SENHA, ID_responsavel, ID_sala) 
                VALUES (:nome, :email, :senha, :id_responsavel, :id_sala)";
        
        // Preparar a SQL (pdo)
        $stmt = $pdo->prepare($sql);
        
        // Definir/organizar os dados p/ SQL
        $dados = array(
            ':nome' => $_POST['nome'],
            ':email' => $_POST['email'],
            ':senha' => md5($_POST['senha']), //md5 é um padrão de criptografia
            ':id_responsavel' => $_POST['id_responsavel'],
            ':id_sala' => $_POST['id_sala']
        );
        
        // Tentar Executar a SQL (INSERT)
        // Realizar a inserção das informações no BD (com o PHP)
        if ($stmt->execute($dados)) {
            header("Location: index.php?msgSucesso=Cadastro de funcionário realizado com sucesso!");
        }
    } catch (PDOException $e) {
        //die($e->getMessage());
        header("Location: index.php?msgErro=Falha ao cadastrar funcionário...");
    }
} else {
    header("Location: index.php?msgErro=Erro de acesso.");
}
die();
// Redirecionar para a página inicial (login) com mensagem de erro/sucesso
?>
