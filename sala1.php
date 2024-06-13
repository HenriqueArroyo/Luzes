<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sala 01</title>
    <link rel="stylesheet" href="css/styleTabela.css">
    <script>
        function editPatrimonio(codigo) {
            let item = prompt("Enter new item:");
            let status = prompt("Enter new status:");
            if (item !== null && status !== null) {
                let formData = new FormData();
                formData.append('codigo', codigo);
                formData.append('item', item);
                formData.append('status', status);
                formData.append('ID_sala', 1);

                fetch('http://localhost/api/updatePatrimonio.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Patrimonio updated successfully!");
                        location.reload();
                    } else {
                        alert("Failed to update patrimonio.");
                    }
                });
            }
        }

        function deletePatrimonio(codigo) {
            if (confirm("Are you sure you want to delete this patrimonio?")) {
                let formData = new FormData();
                formData.append('codigo', codigo);

                fetch('http://localhost/api/deletePatrimonio.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Patrimonio deleted successfully!");
                        location.reload();
                    } else {
                        alert("Failed to delete patrimonio.");
                    }
                });
            }
        }

        function editEstoque(id) {
            let item = prompt("Enter new item:");
            let quantidade = prompt("Enter new quantidade:");
            if (item !== null && quantidade !== null) {
                let formData = new FormData();
                formData.append('ID_estoque', id);
                formData.append('item', item);
                formData.append('quantidade', quantidade);
                formData.append('ID_sala', 1);

                fetch('http://localhost/api/updateEstoque.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Estoque updated successfully!");
                        location.reload();
                    } else {
                        alert("Failed to update estoque.");
                    }
                });
            }
        }

        function deleteEstoque(id) {
            if (confirm("Are you sure you want to delete this estoque?")) {
                let formData = new FormData();
                formData.append('ID_estoque', id);

                fetch('http://localhost/api/deleteEstoque.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Estoque deleted successfully!");
                        location.reload();
                    } else {
                        alert("Failed to delete estoque.");
                    }
                });
            }
        }
    </script>
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

    $patrimonios = fetchPatrimonios(1);
    $estoques = fetchEstoque(1);
    include 'functions.php';
    ?> 
<?= template_headerSala('Sala') ?>

    <h1>Bem vindo a SALA 01</h1>

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
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php if ($patrimonios): ?>
                        <?php foreach ($patrimonios as $patrimonio): ?>
                            <tr>
                                <td><?php echo $patrimonio['codigo']; ?></td>
                                <td><?php echo $patrimonio['item']; ?></td>
                                <td><?php echo $patrimonio['status']; ?></td>
                                <td>
                                    <button id="edit-button" onclick="editPatrimonio('<?php echo $patrimonio['codigo']; ?>')">Editar</button>
                                    <button id="delete-button" onclick="deletePatrimonio('<?php echo $patrimonio['codigo']; ?>')">Remover</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Nenhum patrimônio encontrado.</td>
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
                         <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($estoques): ?>
                        <?php foreach ($estoques as $estoque): ?>
                            <tr>
                                <td><?php echo $estoque['item']; ?></td>
                                <td><?php echo $estoque['quantidade']; ?></td>
                                <td>
                                    <button id="edit-button" onclick="editEstoque('<?php echo $estoque['ID_estoque']; ?>')">Editar</button>
                                    <button id="delete-button" onclick="deleteEstoque('<?php echo $estoque['ID_estoque']; ?>')">Remover</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">Nenhum estoque encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>  
        </div>
    </div> 

</body>  
</html>
