<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Advocacia Silva</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>

<?php
// Mostra mensagem de cadastro realizado
if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1) {
    echo "<script>alert('Cadastro realizado com sucesso! Agora faça login.');</script>";
}
?>

<div class="auth-container">
    <h2>Cadastro</h2>
    <form action="cadastro.php" method="post">
        <input type="text" name="nome" placeholder="Seu nome" required>
        <input type="email" name="email" placeholder="Seu email" required>
        <input type="tel" name="telefone" placeholder="Seu telefone">
        <input type="password" name="senha" placeholder="Sua senha" required>
        <button type="submit">Cadastrar</button>
    </form>
    <p class="switch-link">Já tem conta? <a href="login.php">Entrar</a></p>
</div>

</body>
</html>
