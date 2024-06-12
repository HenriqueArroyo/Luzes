<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sala 01</title>
   <link rel="stylesheet" href="css/styleTabela.css">
</head>
<body>  

    <?php
    require 'conectaBD.php';

    // Consulta para listar os patrimônios
    $sql_patrimonio = "SELECT codigo, item, status FROM Patrimonio WHERE ID_sala = 2";
    $patrimonio_stmt = $pdo->query($sql_patrimonio);
    $patrimonios = $patrimonio_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Consulta para listar o estoque
    $sql_estoque = "SELECT item, quantidade FROM Estoque WHERE ID_sala = 2";
    $estoque_stmt = $pdo->query($sql_estoque);
    $estoques = $estoque_stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

<h1> Bem vindo a SALA 02</h1>

    
    <div class="container"> 

        <div class="table-container"> 

            <h1>Listagem de Patrimônios</h1>
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Item</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patrimonios as $patrimonio): ?>
                        <tr>
                            <td><?php echo $patrimonio['codigo']; ?></td>
                            <td><?php echo $patrimonio['item']; ?></td>
                            <td><?php echo $patrimonio['status']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> 
        
        <div class="table-container">
            <h1>Listagem de Estoque</h1>
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($estoques as $estoque): ?>
                        <tr>
                            <td><?php echo $estoque['item']; ?></td>
                            <td><?php echo $estoque['quantidade']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>  
        </div>
    </div>
</body>
</html>