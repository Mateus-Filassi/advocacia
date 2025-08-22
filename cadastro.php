<?php
// cadastro.php
include 'conexao.php'; // expõe $conn (MySQLi)

// (Dev) exibir erros - remova em produção
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$erro_msg = '';
$ok_msg   = '';

if (isset($_GET['sucesso']) && $_GET['sucesso'] == '1') {
  $ok_msg = 'Cadastro realizado com sucesso! Agora faça login.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Coleta + saneamento
  $nome     = trim($_POST['nome'] ?? '');
  $email    = trim($_POST['email'] ?? '');
  $telefone = trim($_POST['telefone'] ?? '');
  $senha    = $_POST['senha'] ?? '';

  // Validações
  if ($nome === '' || $email === '' || $senha === '') {
    $erro_msg = 'Preencha nome, e-mail e senha.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erro_msg = 'Informe um e-mail válido.';
  } elseif (strlen($senha) < 6) {
    $erro_msg = 'A senha deve ter pelo menos 6 caracteres.';
  }

  if ($erro_msg === '') {
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    try {
      // Verifica se email já existe
      $stmt = $conn->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
      if (!$stmt) { throw new Exception('Falha ao preparar verificação de e-mail: '.$conn->error); }
      $stmt->bind_param('s', $email);
      $stmt->execute();
      $stmt->store_result();

      if ($stmt->num_rows > 0) {
        $erro_msg = 'E-mail já cadastrado.';
      } else {
        $stmt->close();

        // Inserção
        $ins = $conn->prepare('INSERT INTO users (nome, email, telefone, senha_hash) VALUES (?, ?, ?, ?)');
        if (!$ins) { throw new Exception('Falha ao preparar inserção: '.$conn->error); }
        $ins->bind_param('ssss', $nome, $email, $telefone, $senha_hash);
        $ins->execute();
        $ins->close();

        // Redirect para evitar reenvio do formulário
        header('Location: cadastro.php?sucesso=1');
        exit;
      }

      $stmt->close();
    } catch (Throwable $e) {
      // durante o desenvolvimento, mostre o erro real:
      $erro_msg = 'Erro ao cadastrar: ' . $e->getMessage();
      // em produção, troque por:
      // $erro_msg = 'Não foi possível concluir o cadastro. Tente novamente.';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro - Advocacia Silva</title>
  <link rel="stylesheet" href="auth.css">
</head>
<body>
  <div class="auth-container">
    <h2>Cadastro</h2>

    <?php if ($ok_msg): ?>
      <div class="msg sucesso"><?= htmlspecialchars($ok_msg) ?></div>
    <?php endif; ?>

    <?php if ($erro_msg): ?>
      <div class="msg erro"><?= htmlspecialchars($erro_msg) ?></div>
    <?php endif; ?>

    <form action="cadastro.php" method="post" novalidate>
      <input type="text"     name="nome"     placeholder="Seu nome"    required value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>">
      <input type="email"    name="email"    placeholder="Seu email"   required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
      <input type="tel"      name="telefone" placeholder="Seu telefone"         value="<?= htmlspecialchars($_POST['telefone'] ?? '') ?>">
      <input type="password" name="senha"    placeholder="Sua senha"   required>
      <button type="submit">Cadastrar</button>
    </form>

    <p class="switch-link">Já tem conta? <a href="login.php">Entrar</a></p>
  </div>
</body>
</html>
