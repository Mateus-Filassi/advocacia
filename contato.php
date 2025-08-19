<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Contato - Advocacia Silva</title>
  <link rel="stylesheet" href="contato.css">
</head>
<body>

  <div class="container">

    <!-- ESCOLHA DO ADVOGADO -->
    <div id="advogados-section" class="section active">
      <h2>Escolha um Advogado</h2>
      <div class="advogados-container">
        <div class="adv-card" onclick="abrirCalendario('junior')">
          <img src="img/junior.png" alt="Dr. Antônio Junior">
          <p>Dr. Antônio Junior</p>
        </div>
        <div class="adv-card" onclick="abrirCalendario('camila')">
          <img src="img/CamilaNagiara.png" alt="Dra. Camila">
          <p>Dra. Camila</p>
        </div>
        <!-- Adicione os outros aqui -->
      </div>
    </div>

    <!-- CALENDÁRIO -->
    <div id="calendario-section" class="section">
      <h2>Escolha um Dia</h2>
      <div id="calendario"></div>
      <h3 id="titulo-horarios">Horários Disponíveis</h3>
      <div id="horarios"></div>
    </div>

  </div>

  <script src="contato.js"></script>
</body>
</html>
