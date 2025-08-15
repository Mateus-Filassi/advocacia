<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitiza os dados
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mensagem = htmlspecialchars(trim($_POST['mensagem']));

    $sql = "INSERT INTO mensagens (nome, email, mensagem) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $mensagem);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Mensagem enviada com sucesso!</p>";
    } else {
        echo "<p style='color:red;'>Erro ao enviar: " . $conn->error . "</p>";
    }

    echo '<a href="index.php">Voltar</a>';
}
?>
