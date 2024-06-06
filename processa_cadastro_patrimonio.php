<?php
require_once 'conectaBD.php';

if (!empty($_POST['codigo']) && !empty($_POST['item']) && !empty($_POST['status']) && !empty($_POST['id_sala'])) {
    $codigo = $_POST['codigo'];
    $item = $_POST['item'];
    $status = $_POST['status'];
    $sala = $_POST['id_sala'];

    try {
        // Verificar se a sala existe
        $stmt = $pdo->prepare("SELECT ID_sala FROM Sala WHERE ID_sala = ?");
        $stmt->execute([$sala]);
        $sala_existe = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($sala_existe) {
            // Inserir os dados na tabela Patrimonio
            $sql = "INSERT INTO Patrimonio (codigo, item, status, ID_sala) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$codigo, $item, $status, $sala]);

            echo "Patrimônio cadastrado com sucesso!";
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
