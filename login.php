<?php
session_start();
include 'conexao.php';

// Usuário de teste
$usuarioTeste = [
    'email' => 'teste@teste.com',
    'senha' => password_hash('123456', PASSWORD_DEFAULT),
    'nome' => 'Usuário Teste'
];

$mensagemErro = '';
$loginSucesso = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica login com usuário de teste
    if ($email === $usuarioTeste['email'] && password_verify($senha, $usuarioTeste['senha'])) {
        $_SESSION['usuario'] = $usuarioTeste['nome'];
        $loginSucesso = true;
    } else {
        $mensagemErro = "Email ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Advocacia Silva</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>

<div class="auth-container">
    <h2>Login</h2>

    <?php if (!empty($mensagemErro)) { ?>
        <p style="color:red; text-align:center;"><?php echo $mensagemErro; ?></p>
    <?php } ?>

    <?php if (!$loginSucesso) { ?>
        <form action="" method="post">
            <input type="email" name="email" placeholder="Seu email" required>
            <input type="password" name="senha" placeholder="Sua senha" required>
            <button type="submit">Entrar</button>
        </form>
        <p class="switch-link">Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
    <?php } else { ?>
        <p>Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</p>
        <a href="contato.php"><button>Ir para Contato</button></a>
    <?php } ?>
</div>

</body>
</html>
