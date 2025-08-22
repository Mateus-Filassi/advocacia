-- BANCO: advocacia
CREATE DATABASE IF NOT EXISTS advocacia
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_general_ci;

USE advocacia;

-- Tabela de mensagens
CREATE TABLE IF NOT EXISTS mensagens (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(160) NOT NULL,
  mensagem TEXT NOT NULL,
  data_envio TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_mensagens_email (email),
  INDEX idx_mensagens_data (data_envio)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(120) NOT NULL,
  email VARCHAR(160) NOT NULL UNIQUE,
  telefone VARCHAR(30) NULL,
  senha_hash VARCHAR(255) NOT NULL,
  criado_em TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela de advogados
CREATE TABLE IF NOT EXISTS advogados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(160) NOT NULL,
  oab VARCHAR(40) NULL,
  area VARCHAR(100) NULL,
  foto VARCHAR(255) NULL,
  ativo TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO advogados (id, nome, oab, area, foto) VALUES
 (1, 'Dr. Antônio Lafaiete S. Junior', 'OAB/SP 357.810', 'Direito Civil', 'assets/antonio.jpg'),
 (2, 'Dra. Camila Nagiara N. Barbosa', 'OAB/SP 380.239', 'Direito Trabalhista', 'assets/camila.jpg'),
 (3, 'Dr. Murilo H. Luchi de Souza',   'OAB/SP 317.200', 'Direito Criminal', 'assets/murilo.jpg'),
 (4, 'Dra. Lais F. Bonfim da Silva',   'OAB/MG 218.076', 'Direito Previdenciário', 'assets/lais.jpg'),
 (5, 'Dr. Victor Bazaglia Viana',      'OAB/SP 379.206', 'Direito do Consumidor', 'assets/victor.jpg')
ON DUPLICATE KEY UPDATE oab=VALUES(oab), area=VALUES(area), foto=VALUES(foto);

-- Tabela de agendamentos
CREATE TABLE IF NOT EXISTS agendamentos (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  advogado_id INT NOT NULL,
  data_consulta DATE NOT NULL,
  hora_consulta TIME NOT NULL,
  cliente_nome VARCHAR(160) NOT NULL,
  cliente_email VARCHAR(160) NULL,
  cliente_tel VARCHAR(30) NULL,
  observacoes VARCHAR(500) NULL,
  status ENUM('reservado','cancelado','concluido') NOT NULL DEFAULT 'reservado',
  criado_em TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_adv (advogado_id),
  UNIQUE KEY uq_slot (advogado_id, data_consulta, hora_consulta),
  INDEX idx_ag_data (data_consulta),
  INDEX idx_ag_status (status),
  CONSTRAINT fk_ag_adv FOREIGN KEY (advogado_id) REFERENCES advogados(id)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
