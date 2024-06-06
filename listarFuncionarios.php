<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionários</title>
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
    <h1>Lista de Funcionários</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Responsável</th>
                <th>Sala</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'conectaBD.php';
            $sql = "SELECT f.ID_funcionario, f.NOME AS nome_funcionario, f.EMAIL, r.NOME AS nome_responsavel, s.ID_sala
                    FROM Funcionario f
                    LEFT JOIN Responsavel r ON f.ID_responsavel = r.ID_responsavel
                    LEFT JOIN Sala s ON f.ID_sala = s.ID_sala";
            $stmt = $pdo->query($sql);
            $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($funcionarios as $funcionario) {
                echo "<tr>";
                echo "<td>{$funcionario['id_funcionario']}</td>";
                echo "<td>{$funcionario['nome_funcionario']}</td>";
                echo "<td>{$funcionario['email']}</td>";
                echo "<td>{$funcionario['nome_responsavel']}</td>";
                echo "<td>{$funcionario['id_sala']}</td>";
                echo "<td>
                        <a href='editar_funcionario.php?id={$funcionario['id_funcionario']}'>Editar</a> |
                        <a href='remover_funcionario.php?id={$funcionario['id_funcionario']}' onclick='return confirm(\"Tem certeza que deseja remover este funcionário?\")'>Remover</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
