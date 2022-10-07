DROP DATABASE IF EXISTS frameworksenac;
CREATE DATABASE frameworksenac;
USE frameworksenac;

CREATE TABLE usuario(
    id_user INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nomeUsuario VARCHAR(255) NOT NULL,
    sobrenomeUsuario VARCHAR(255) NOT NULL,
    idade INTEGER NOT NULL,
    cpf VARCHAR(255) NOT NULL,
    celular VARCHAR(255),
    fixo VARCHAR(255)
);