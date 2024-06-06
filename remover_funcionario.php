<?php
// Verifica se o ID do funcionário foi fornecido na URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_funcionario = $_GET['id'];
    
    // Inclua o arquivo de conexão com o banco de dados
    require 'conectaBD.php';

    try {
        // Prepare a instrução SQL para excluir o funcionário com base no ID fornecido
        $sql = "DELETE FROM Funcionario WHERE ID_funcionario = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id_funcionario, PDO::PARAM_INT);

        // Execute a instrução preparada
        if($stmt->execute()) {
            // Redireciona de volta para a página de lista de funcionários com mensagem de sucesso
            header("Location: listarFuncionarios.php?msgSucesso=Funcionário removido com sucesso.");
            exit();
        } else {
            // Redireciona de volta para a página de lista de funcionários com mensagem de erro
            header("Location: listarFuncionarios.php?msgErro=Erro ao remover funcionário.");
            exit();
        }
    } catch(PDOException $e) {
        // Em caso de erro na execução da instrução SQL, exiba uma mensagem de erro
        echo "Erro: " . $e->getMessage();
    }
} else {
    // Se nenhum ID de funcionário foi fornecido na URL, redirecione de volta para a página de lista de funcionários
    header("Location: listarFuncionarios.php?msgErro=ID de funcionário não fornecido.");
    exit();
}
?>
