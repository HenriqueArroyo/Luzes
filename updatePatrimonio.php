<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];
    $item = $_POST['item'];
    $status = $_POST['status'];
    $id_sala = $_POST['ID_sala'];

    $url = "http://localhost/api/api_patrimonio.php"; // URL da API

    $data = [
        'codigo' => $codigo,
        'item' => $item,
        'status' => $status,
        'ID_sala' => $id_sala
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); // Método HTTP PUT
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    echo $response; // Retorna a resposta da API para o front-end
}
?>
