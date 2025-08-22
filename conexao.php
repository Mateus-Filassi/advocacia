<?php
// conexao.php — MySQLi na porta 3307
$host    = "127.0.0.1:3307";
$usuario = "root";
$senha   = "";
$banco   = "advocacia";

$conn = new mysqli($host, $usuario, $senha, $banco);

// charset
if (!$conn->set_charset("utf8mb4")) {
    die("Erro ao definir charset: " . $conn->error);
}

// erro de conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
