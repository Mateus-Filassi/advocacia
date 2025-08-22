<?php
// login.php
session_start();
include 'conexao.php'; // expõe $conn (MySQLi na 3307)

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$erro_msg = '';
$ok_msg   = isset($_GET['sucesso']) && $_GET['sucesso'] == '1'
          ? 'Cadastro realizado com sucesso! Faça login.'
          : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = trim($_POST['email'] ?? '');
  $senha = $_POST['senha'] ?? '';

  if ($email === '' || $senha === '') {
    $erro_msg = 'Informe e-mail e senha.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erro_msg = 'E-mail inválido.';
  }

  if ($erro_msg === '') {
    try {
      // Busca usuário pelo e-mail
      $stmt = $conn->prepare('SELECT id, nome, email, senha_hash FROM users WHERE email = ? LIMIT 1');
      if (!$stmt) { throw new Exception('Falha ao preparar consulta: '.$conn->error); }
      $stmt->bind_param('s', $email);
      $stmt->execute();
      $res = $stmt->get_result();
      $user = $res->fetch_assoc();
      $stmt->close();

      if ($user && password_verify($senha, $user['senha_hash'])) {
        // sucesso: inicia sessão segura
        session_regenerate_id(true);
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['user_nome'] = $user['nome'];
        $_SESSION['user_email']= $user['email'];
    
        // redireciona para contato.php
        header('Location: contato.php');
        exit;
    } else {
        $erro_msg = 'Email ou senha incorretos!';
    }
    
    } catch (Throwable $e) {
      // Em dev, mostre o erro. Em produção, troque por mensagem genérica.
      $erro_msg = 'Erro ao autenticar: ' . $e->getMessage();
    }
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

    <?php if ($ok_msg): ?>
      <div class="msg sucesso"><?= htmlspecialchars($ok_msg) ?></div>
    <?php endif; ?>
    <?php if ($erro_msg): ?>
      <div class="msg erro"><?= htmlspecialchars($erro_msg) ?></div>
    <?php endif; ?>

    <form action="login.php" method="post" novalidate>
      <input type="email"    name="email" placeholder="Seu email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
      <input type="password" name="senha" placeholder="Sua senha" required>
      <button type="submit">Entrar</button>
    </form>

    <p class="switch-link">Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
  </div>
</body>
</html>
