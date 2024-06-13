

<body>  

<?php
include 'functions.php'; 


    ?> 

<?= template_headerSala('Sala') ?> 

<div class="container"> 
        <div class="table-container"> 
            <h1>Listagem de Funcionários</h1>
            <link rel="stylesheet" href="css/styleTabela.css">
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
    </div> 

    <div class="table-container">
    <h1>Lista de Responsaveis</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>ID Setor</th>
            </tr>
        </thead>
        
        <tbody>

    <?php
                // URL da API que retorna os dados dos funcionários
                $api_url = 'http://localhost/api/api_responsavel.php';
                
                // Inicializa a sessão cURL
                $curl = curl_init($api_url);

                // Configura a opção para retornar a resposta como string
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                // Executa a solicitação e obtém a resposta
                $response = curl_exec($curl);

                // Fecha a sessão cURL
                curl_close($curl);

                // Converte a resposta JSON em array
                $responsaveis = json_decode($response, true);

                // Verifica se a resposta contém dados
                if (!empty($responsaveis)) {
                    foreach ($responsaveis as $responsavel) {
                        echo '<tr>';
                        echo '<td>' . $responsavel['ID_responsavel'] . '</td>';
                        echo '<td>' . $responsavel['NOME'] . '</td>';
                        echo '<td>' . $responsavel['EMAIL'] . '</td>';
                        echo '<td>' . $responsavel['ID_setor'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">Nenhum Responsavel encontrado.</td></tr>';
                }
            ?>
     </tbody> 
     </table> 
     </div>
     </div> 
</body>

</html>