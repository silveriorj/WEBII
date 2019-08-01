CREATE TABLE IF NOT EXISTS demolays(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(256) NOT NULL,
    mail VARCHAR(256) NOT NULL,
    user VARCHAR(256) NOT NULL,
    pwd VARCHAR(256) NOT NULL,
    capitulo INT,
    grau_id INT,
    cargo_id INT,
    FOREIGN KEY (grau_id) REFERENCES graus(id),
    FOREIGN KEY (cargo_id) REFERENCES cargos(id),
    FOREIGN KEY (capitulo) REFERENCES capitulos(id)
);

CREATE TABLE IF NOT EXISTS capitulos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    capitulo VARCHAR(256) NOT NULL
);

CREATE TABLE IF NOT EXISTS graus(
    id INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(256) NOT NULL,
    sigla VARCHAR(3) NOT NULL
);

CREATE TABLE IF NOT EXISTS cargos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(256) NOT NULL,
    sigla VARCHAR(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS telefone (
    id_user INT PRIMARY KEY,
    phone VARCHAR(14),
    FOREIGN KEY(id_user) REFERENCES demolays (id)
);

/* Insere os graus básicos presentes nos capítulo */
INSERT into graus(id, descricao, sigla) VALUES 
(1, 'Grau Iniciático', 'G.I'), 
(2, 'Grau Demolay', 'G.D'), 
(3, 'Grau de Cavaleiro', 'Cav'), 
(4, 'Senior', 'Sên');

/* Insere os Cargos Ativos presentes no Capítulo */
INSERT INTO `cargos` (`id`, `descricao`, `sigla`) VALUES
(1, 'Mestre Conselheiro', 'M.C'),
(2, 'Primeiro Conselheiro', '1.C'),
(3, 'Segundo Conselheiro', '2.C'),
(4, 'Primeiro Diácono', '1.D'),
(5, 'Segundo Diácono', '2.D'),
(6, 'Primeiro Mordomo', '1.M'),
(7, 'Segundo Mordomo', '2.M'),
(8, 'Mestre de Cerimônias', 'M.Cer'),
(9, 'Porta Bandeira', 'P.B'),
(10, 'Orador', 'Or'),
(11, 'Capelão', 'Cap'),
(12, 'Tesoureiro', 'Tes'),
(13, 'Escrivão', 'Escr'),
(14, 'Hospitaleiro', 'Hosp'),
(15, 'Sentinela', 'Sent'),
(16, 'Mestre de Harmônias', 'M. Harm'),
(17, 'Preceptor', 'Prep'),
(18, 'Consultor', 'S.Con');


CREATE TABLE IF NOT EXISTS gestaos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_capitulo INT,
    id_mc INT,
    gestao DATE,
    descricao VARCHAR(256)
);

CREATE TABLE IF NOT EXISTS frequencias(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_task INT,
    id_user INT,
    frequencia INT
);