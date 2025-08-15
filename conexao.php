<?php
$host = "127.0.0.1:3307"; 
$usuario = "root";
$senha = "";
$banco = "advocacia";    

$conn = new mysqli($host, $usuario, $senha, $banco);

// Define charset
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
