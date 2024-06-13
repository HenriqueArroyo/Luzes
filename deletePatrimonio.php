<?php
require_once "connection/Connection.php";
require_once "Patrimonio.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];
    
    $result = Patrimonio::delete($codigo);
    echo json_encode(['success' => $result]);
}
?>
