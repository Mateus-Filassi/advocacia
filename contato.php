<?php /* contato.php */ ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Contato / Agendamento</title>
  <link rel="stylesheet" href="contato.css">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
  <div class="container">
    <h2>Escolha um Advogado</h2>

    <!-- LISTA DE ADVOGADOS (GRADE) -->
    <section id="advogados-section" class="section active">
      <div class="advogados-container">
        <div class="adv-card" onclick="abrirCalendario(1,'Dr. Antônio Lafaiete S. Junior')">
          <img src="img/junior.png" alt="Dr. Antônio Lafaiete S. Junior">
          <h3>Dr. Antônio<br>Lafaiete S. Junior</h3>
          <p>OAB/SP 357.810</p>
          <p>Direito Civil</p>
        </div>

        <div class="adv-card" onclick="abrirCalendario(2,'Dra. Camila Nagiara N. Barbosa')">
          <img src="img/CamilaNagiara.png" alt="Dra. Camila Nagiara N. Barbosa">
          <h3>Dra. Camila<br>Nagiara N. Barbosa</h3>
          <p>OAB/SP 380.239</p>
          <p>Direito Trabalhista</p>
        </div>

        <div class="adv-card" onclick="abrirCalendario(3,'Dr. Murilo H. Luchi de Souza')">
          <img src="img/MuriloLuchi.png" alt="Dr. Murilo H. Luchi de Souza">
          <h3>Dr. Murilo H.<br>Luchi de Souza</h3>
          <p>OAB/SP 317.200</p>
          <p>Direito Criminal</p>
        </div>

        <div class="adv-card" onclick="abrirCalendario(4,'Dra. Lais F. Bonfim da Silva')">
          <img src="img/LaisBonfim.png" alt="Dra. Lais F. Bonfim da Silva">
          <h3>Dra. Lais F.<br>Bonfim da Silva</h3>
          <p>OAB/MG 218.076</p>
          <p>Direito Previdenciário</p>
        </div>

        <div class="adv-card" onclick="abrirCalendario(5,'Dr. Victor Bazaglia Viana')">
          <img src="img/VictorBazaglia.png" alt="Dr. Victor Bazaglia Viana">
          <h3>Dr. Victor Bazaglia<br>Viana</h3>
          <p>OAB/SP 379.206</p>
          <p>Direito do Consumidor</p>
        </div>
      </div>
    </section>

    <!-- CALENDÁRIO / HORÁRIOS -->
    <section id="calendario-section" class="section">
      <h3 id="titulo-calendario">Selecione uma data</h3>

      <div id="calendario"></div>
      <div id="horarios"></div>

      <div style="margin-top:16px">
        <button onclick="voltarParaLista()" style="padding:10px 16px;border:none;border-radius:8px;cursor:pointer;">
          ← Voltar aos Advogados
        </button>
      </div>
    </section>
  </div>

  <script src="contato.js"></script>
  <script>
    function voltarParaLista() {
      document.getElementById("calendario-section").classList.remove("active");
      document.getElementById("advogados-section").classList.add("active");
    }
  </script>
</body>
</html>
