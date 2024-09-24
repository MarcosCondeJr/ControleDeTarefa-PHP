CREATE DATABASE `controletarefas`;

CREATE TABLE `categorias` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `responsaveis` (
  `id_responsavel` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  PRIMARY KEY (`id_responsavel`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `tarefas` (
  `id_tarefa` int NOT NULL AUTO_INCREMENT,
  `id_categoria` int NOT NULL,
  `id_responsavel` int NOT NULL,
  `nome_tarefa` varchar(100) NOT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_tarefa`),
  KEY `fk_id_responsavel_idx` (`id_responsavel`),
  KEY `fk_id_categoria_idx` (`id_categoria`),
  CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
  CONSTRAINT `fk_id_responsavel` FOREIGN KEY (`id_responsavel`) REFERENCES `responsaveis` (`id_responsavel`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `tarefas_finalizadas` (
  `id_tarefa` int NOT NULL,
  `datahora_final` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tarefa`),
  CONSTRAINT `fk_id_tarefa_finalizadas` FOREIGN KEY (`id_tarefa`) REFERENCES `tarefas` (`id_tarefa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `tarefas_iniciadas` (
  `id_tarefa` int NOT NULL,
  `datahora_inicio` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tarefa`),
  CONSTRAINT `fk_id_tarefa` FOREIGN KEY (`id_tarefa`) REFERENCES `tarefas` (`id_tarefa`)
) ENGINE=InnoDB DEFAULT CHARSET=eucjpms;

CREATE TABLE `tarefas_pause` (
  `id_tarefa` int NOT NULL,
  `datahora_pause` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tarefa`),
  CONSTRAINT `fk_id_tarefa_pause` FOREIGN KEY (`id_tarefa`) REFERENCES `tarefas` (`id_tarefa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `tarefas_retomar` (
  `id_tarefa` int NOT NULL,
  `datahora_retomar` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tarefa`),
  CONSTRAINT `fk_id_tarefa_retomar` FOREIGN KEY (`id_tarefa`) REFERENCES `tarefas` (`id_tarefa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
