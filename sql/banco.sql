CREATE DATABASE crud;
USE crud;
CREATE TABLE professor (
    nome VARCHAR(40) NOT NULL,
    especialidade VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    lattes VARCHAR(200),
    PRIMARY KEY (email)
);