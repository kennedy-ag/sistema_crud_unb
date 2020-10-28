-- Cria o banco de dados
CREATE DATABASE crud;
-- Usa o banco de dados
USE crud;
-- Cria a tabela professor com os campos descritos
CREATE TABLE professor (
    nome VARCHAR(40) NOT NULL,
    especialidade VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    lattes VARCHAR(200),
    PRIMARY KEY (email)
);