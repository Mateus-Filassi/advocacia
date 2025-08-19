<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Advocacia Silva</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="navbar-fundo"></div>

<header class="navbar">
    <div class="navbar-content">
        <div class="logo-texto">
            <img src="img/logoinv.png" alt="Logo" class="logo-img">
            <div class="logo-texto-conteudo">
                <h1>Escritório X</h1>
                <p>Advocacia & Consultoria</p>
            </div>
        </div>
        <a href="https://wa.me/5517996492038" class="btn-whatsapp">WhatsApp</a>
        <button class="menu-hamburger">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>
        <section class="sobre-container">
            <div class="sobre-imagem">
                <img src="img/advocacia.png" alt="Foto da Advocacia Silva">
            </div>
            <div class="sobre-texto">
                <h2>Sobre a Advocacia Silva</h2>
                <p>
                    Fundada com o propósito de oferecer um atendimento jurídico humanizado e eficiente, localizado na <b>R. Bahia, 3154 - São João</b>, a Advocacia Silva atua com dedicação em diversas áreas do direito, sempre priorizando a proteção dos direitos de seus clientes. Nossa equipe é formada por profissionais experientes que buscam soluções justas e estratégicas, garantindo segurança e confiança em cada atendimento.
                </p>
                <p>
                    Atuamos com ética, transparência e compromisso social, oferecendo suporte completo em processos judiciais e consultorias preventivas. Nosso objetivo é assegurar que cada cliente se sinta amparado e seguro durante todo o processo jurídico.
                </p>
            </div>
        </section>

        <section>
            <h2>Áreas de Atuação</h2>
            <div class="carousel-container">
                <div class="carousel-track">
                    <div class="card">
                        <div class="icon">🧑‍⚖️</div>
                        <h3>Previdenciário</h3>
                        <p>Orientação e defesa em direitos previdenciários, aposentadorias e benefícios sociais.</p>
                    </div>
                    <div class="card">
                        <div class="icon">⚖️</div>
                        <h3>Trabalhista</h3>
                        <p>Atuação em direitos dos trabalhadores e empresas, reclamações e acordos trabalhistas.</p>
                    </div>
                    <div class="card">
                        <div class="icon">🔒</div>
                        <h3>Criminal</h3>
                        <p>Defesa em processos criminais, proteção de direitos e acompanhamento judicial.</p>
                    </div>
                    <div class="card">
                        <div class="icon">🏠</div>
                        <h3>Civil</h3>
                        <p>Assessoria em contratos, responsabilidade civil, família e sucessões.</p>
                    </div>
                    <div class="card">
                        <div class="icon">🛒</div>
                        <h3>Consumidor</h3>
                        <p>Defesa dos direitos do consumidor em compras, serviços e relações comerciais.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="profissionais">
            <h2>Nossos Profissionais</h2>
            <div class="profissionais-container">
                <div class="profissional-card">
                    <img src="img/junior.png" alt="Dr. Antônio Lafaiete S. Junior">
                    <h3>Dr. Antônio Lafaiete S. Junior</h3>
                    <p>OAB 357.810</p>
                    <p>Direito Civil</p>
                </div>
                <div class="profissional-card">
                    <img src="img/CamilaNagiara.png" alt="Dra. Camila Nagiara N. Barbosa">
                    <h3>Dra. Camila Nagiara N. Barbosa</h3>
                    <p>OAB 234.567</p>
                    <p>Direito Trabalhista</p>
                </div>
                <div class="profissional-card">
                    <img src="img/MuriloLuchi.png" alt="Dr. Murilo H. Luchi de Souza">
                    <h3>Dr. Murilo H. Luchi de Souza</h3>
                    <p>OAB 456.789</p>
                    <p>Direito Criminal</p>
                </div>
                <div class="profissional-card">
                    <img src="img/LaisBonfim.png" alt="Dra. Lais F. Bonfim da Silva">
                    <h3>Dra. Lais F. Bonfim da Silva</h3>
                    <p>OAB 567.890</p>
                    <p>Direito Previdenciário</p>
                </div>
                <div class="profissional-card">
                    <img src="img/VictorBazaglia.png" alt="Dr. Victor Bazaglia Viana">
                    <h3>Dr. Victor Bazaglia Viana</h3>
                    <p>OAB 678.901</p>
                    <p>Direito do Consumidor</p>
                </div>
            </div>
        </section>

        <section class="agendamento-section">
            <div class="agendamento-imagem">
                <img src="img/papel.png" alt="Agendamento">
            </div>
            <div class="agendamento-texto">
                <div class="texto-bloco">
                    <h2>Agende sua consulta</h2>
                    <p>É simples e rápido!</p>
                </div>
                <a href="login.php" class="btn-agendar">Agendar</a>
            </div>
        </section>

        <section id="contato" class="fale-conosco-section">
            <h2>Fale Conosco</h2>
            <div class="fale-container">
                <div class="contatos-info">
                    <div class="contato-card">
                        <span class="icon">📞</span>
                        <p><strong>Telefone:</strong> (17) 99649-2038</p>
                    </div>
                    <div class="contato-card">
                        <span class="icon">💬</span>
                        <p><strong>WhatsApp:</strong> <a href="https://wa.me/5517996492038  " target="_blank">(17) 99649-2038</a></p>
                    </div>
                    <div class="contato-card">
                        <span class="icon">✉️</span>
                        <p><strong>Email:</strong> <a href="mailto:contato@advocaciasilva.com.br">mateuslopesfilassi@gmail.com</a></p>
                    </div>
                    <div class="contato-card">
                        <span class="icon">📍</span>
                        <p><strong>Endereço:</strong> R. Bahia, 3154 - São João, Votuporanga - SP</p>
                    </div>
                </div>
                <div class="formulario-contato">
                    <h3>Envie uma Mensagem</h3>
                    <form action="#" method="post">
                        <input type="text" name="nome" placeholder="Seu nome" required>
                        <input type="email" name="email" placeholder="Seu email" required>
                        <input type="tel" name="telefone" placeholder="Seu telefone">
                        <textarea name="mensagem" placeholder="Digite sua mensagem" required></textarea>
                        <button type="submit">Enviar Mensagem</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script>
        const track = document.querySelector('.carousel-track');
        const cards = Array.from(track.children);
        track.innerHTML += track.innerHTML;
        let position = 0;
        function moveCarousel() {
            position -= 1; 
            if (Math.abs(position) >= track.scrollWidth / 2) {
                position = 0;
            }
            track.style.transform = 'translateX(' + position + 'px)';
            requestAnimationFrame(moveCarousel);
        }
        moveCarousel();

        const linksMenu = document.querySelectorAll('.menu-lateral a');
        const menuLateral = document.querySelector('.menu-lateral');
        const overlayMenu = document.querySelector('.overlay-menu');

        linksMenu.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if(href.startsWith('#')) {
                    e.preventDefault();
                    const targetId = href.substring(1);
                    const targetSection = document.getElementById(targetId);
                    menuLateral.classList.remove('menu-ativo');
                    overlayMenu.classList.remove('ativo');

                    targetSection.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        const btnHamburger = document.getElementById('btn-hamburger');
        btnHamburger.addEventListener('click', () => {
            menuLateral.classList.toggle('menu-ativo');
            overlayMenu.classList.toggle('ativo');
        });

        overlayMenu.addEventListener('click', () => {
            menuLateral.classList.remove('menu-ativo');
            overlayMenu.classList.remove('ativo');
        });
    </script>
</body>
</html>
