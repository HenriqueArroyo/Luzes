<?php
require_once 'conectaBD.php';

if (!empty($_POST['item']) && !empty($_POST['quantidade']) && !empty($_POST['sala'])) {
    $item = $_POST['item'];
    $quantidade = $_POST['quantidade'];
    $sala = $_POST['sala'];

    try {
        // Verificar se a sala existe
        $stmt = $pdo->prepare("SELECT ID_sala FROM Sala WHERE ID_sala = ?");
        $stmt->execute([$sala]);
        $sala_existe = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($sala_existe) {
            // Inserir os dados na tabela Estoque
            $sql = "INSERT INTO Estoque (item, quantidade, ID_sala) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$item, $quantidade, $sala]);

            echo "Item de estoque cadastrado com sucesso!";
        } else {
            echo "Sala não encontrada.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Por favor, preencha todos os campos.";
}
?>
