CREATE DATABASE et 
CHARACTER SET utf8 
COLLATE utf8_general_ci;

USE et;

CREATE TABLE eletivas(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_eletiva VARCHAR(255) NOT NULL,
    nome_professores VARCHAR(255) NOT NULL,
    turmas TEXT NOT NULL,
    turno VARCHAR(255) NOT NULL,
    vagas INT NOT NULL
) 

CHARACTER SET utf8 
COLLATE utf8_general_ci;

CREATE TABLE tutoria(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_professor VARCHAR(255) NOT NULL,
    turno VARCHAR(255) NOT NULL,
    vagas INT NOT NULL
)
CHARACTER SET utf8 
COLLATE utf8_general_ci;

CREATE TABLE eletivas_escolhas(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_eletiva INT NOT NULL,
    nome_eletiva VARCHAR(255) NOT NULL,
    ra_aluno INT NOT NULL,
    nome_aluno VARCHAR(255) NOT NULL,
    turma_aluno VARCHAR(255) NOT NULL,
    turno_aluno VARCHAR(255) NOT NULL
)

CHARACTER SET utf8 
COLLATE utf8_general_ci;
    
CREATE TABLE tutoria_escolhas(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_tutoria INT NOT NULL,
    nome_tutoria VARCHAR(255) NOT NULL,
    ra_aluno INT NOT NULL,
    nome_aluno VARCHAR(255) NOT NULL,
    turma_aluno VARCHAR(255) NOT NULL,
    turno_aluno VARCHAR(255) NOT NULL
)
CHARACTER SET utf8 
COLLATE utf8_general_ci;

CREATE TABLE liberado(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    status VARCHAR(255) NOT NULL
)
CHARACTER SET utf8 
COLLATE utf8_general_ci;

INSERT INTO liberado(nome, status) 
VALUES
("ELETIVA", "1"),
("TUTORIA", "1");
