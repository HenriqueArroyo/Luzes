<!DOCTYPE html>
<html>
<head>
    <title>Exibindo Duas Tabelas Lado a Lado</title>
    <style>
        .table-container {
            display: inline-block;
            width: 45%; /* Ajuste conforme necessário */
            margin-right: 20px; /* Espaçamento entre as tabelas */
        }
        table {
            border-collapse: collapse;
            width: 100%;
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

<div class="table-container">
    <h2>Tabela 1</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
        </tr>
        <?php
        // Exemplo de dados para a primeira tabela
        $dados_tabela1 = array(
            array("João", 25),
            array("Maria", 30),
            array("Pedro", 28)
        );
        
        // Loop para exibir os dados
        foreach ($dados_tabela1 as $dados) {
            echo "<tr>";
            foreach ($dados as $valor) {
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>

<div class="table-container">
    <h2>Tabela 2</h2>
    <table>
        <tr>
            <th>Produto</th>
            <th>Preço</th>
        </tr>
        <?php
        // Exemplo de dados para a segunda tabela
        $dados_tabela2 = array(
            array("Camisa", 20),
            array("Calça", 35),
            array("Boné", 10)
        );
        
        // Loop para exibir os dados
        foreach ($dados_tabela2 as $dados) {
            echo "<tr>";
            foreach ($dados as $valor) {
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>

</body>
</html>



INSERT INTO Estoque (item, quantidade, ID_sala)
VALUES 
    ('Papel', 100, 1),
    ('Caneta', 50, 1),
    ('Lápis', 30, 1),
    ('Papel', 100, 2),
    ('Caneta', 50, 2),
    ('Lápis', 30, 2),
    ('Papel', 100, 3),
    ('Caneta', 50, 3),
    ('Lápis', 30, 3),
    ('Papel', 100, 4),
    ('Caneta', 50, 4),
    ('Lápis', 30, 4),
    ('Papel', 100, 5),
    ('Caneta', 50, 5),
    ('Lápis', 30, 5),
    ('Papel', 100, 6),
    ('Caneta', 50, 6),
    ('Lápis', 30, 6); 


    INSERT INTO Patrimonio (codigo, item, status, ID_sala)
VALUES 
    ('P001', 'Computador', 'Disponível', 1),
    ('P002', 'Impressora', 'Em uso', 1),
    ('P003', 'Computador', 'Disponível', 2),
    ('P004', 'Impressora', 'Em uso', 2),
    ('P005', 'Computador', 'Disponível', 3),
    ('P006', 'Impressora', 'Em uso', 3),
    ('P007', 'Computador', 'Disponível', 4),
    ('P008', 'Impressora', 'Em uso', 4),
    ('P009', 'Computador', 'Disponível', 5),
    ('P010', 'Impressora', 'Em uso', 5),
    ('P011', 'Computador', 'Disponível', 6),
    ('P012', 'Impressora', 'Em uso', 6);