<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrimônios e Estoque da Sala 1</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Patrimônios e Estoque da Sala 1</h1>
    <h2>Patrimônios</h2>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Item</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta SQL para obter os patrimônios da Sala 1
            $sql_patrimonio = "SELECT * FROM Patrimonio WHERE ID_sala = 1";
            $stmt_patrimonio = $pdo->query($sql_patrimonio);
            $patrimonios = $stmt_patrimonio->fetchAll(PDO::FETCH_ASSOC);
            foreach ($patrimonios as $patrimonio) {
                echo "<tr>";
                echo "<td>{$patrimonio['codigo']}</td>";
                echo "<td>{$patrimonio['item']}</td>";
                echo "<td>{$patrimonio['status']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Estoque</h2>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta SQL para obter o estoque da Sala 1
            $sql_estoque = "SELECT * FROM Estoque WHERE ID_sala = 1";
            $stmt_estoque = $pdo->query($sql_estoque);
            $estoque = $stmt_estoque->fetchAll(PDO::FETCH_ASSOC);
            foreach ($estoque as $item) {
                echo "<tr>";
                echo "<td>{$item['item']}</td>";
                echo "<td>{$item['quantidade']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
