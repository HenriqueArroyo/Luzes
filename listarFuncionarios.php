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

    th,
    td {
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
                <th>ID Responsável</th>
                <th>ID Sala</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // URL da API que retorna os dados dos funcionários
                $api_url = 'http://localhost/api/api_funcionario.php';
                
                // Inicializa a sessão cURL
                $curl = curl_init($api_url);

                // Configura a opção para retornar a resposta como string
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                // Executa a solicitação e obtém a resposta
                $response = curl_exec($curl);

                // Fecha a sessão cURL
                curl_close($curl);

                // Converte a resposta JSON em array
                $funcionarios = json_decode($response, true);

                // Verifica se a resposta contém dados
                if (!empty($funcionarios)) {
                    foreach ($funcionarios as $funcionario) {
                        echo '<tr>';
                        echo '<td>' . $funcionario['ID_funcionario'] . '</td>';
                        echo '<td>' . $funcionario['NOME'] . '</td>';
                        echo '<td>' . $funcionario['EMAIL'] . '</td>';
                        echo '<td>' . $funcionario['ID_responsavel'] . '</td>';
                        echo '<td>' . $funcionario['ID_sala'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">Nenhum funcionário encontrado.</td></tr>';
                }
            ?>
        </tbody>
    </table>
</body>

</html>