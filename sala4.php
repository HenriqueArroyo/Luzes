
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sala 04</title>
    <link rel="stylesheet" href="css/styleTabela.css">
</head>
<body>  

    <?php
    function fetchPatrimonios($id_sala) {
        $url = "http://localhost/api/api_patrimonio.php?id_sala=" . $id_sala;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    function fetchEstoque($id_sala) {
        $url = "http://localhost/api/api_estoque.php?id_sala=" . $id_sala;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    $patrimonios = fetchPatrimonios(4);
    $estoques = fetchEstoque(4);
    include 'functions.php';
    ?> 
<?= template_headerSala('LocEdu') ?>

    <h1>Bem vindo a SALA 04</h1>

    <div class="container"> 
        <div class="table-container"> 
            <h1>Listagem de Patrimônios</h1>
            <link rel="stylesheet" href="css/styleTabela.css">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Item</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($patrimonios): ?>
                        <?php foreach ($patrimonios as $patrimonio): ?>
                            <tr>
                                <td><?php echo $patrimonio['codigo']; ?></td>
                                <td><?php echo $patrimonio['item']; ?></td>
                                <td><?php echo $patrimonio['status']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">Nenhum patrimônio encontrado.</td>
                        </tr>
                    <?php endif; ?>
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
                    <?php if ($estoques): ?>
                        <?php foreach ($estoques as $estoque): ?>
                            <tr>
                                <td><?php echo $estoque['item']; ?></td>
                                <td><?php echo $estoque['quantidade']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2">Nenhum estoque encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>  
        </div>
    </div> 

</body>  
</html>
