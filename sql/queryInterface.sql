DROP DATABASE IF EXISTS frameworksenac;
CREATE DATABASE frameworksenac;
USE frameworksenac;

CREATE TABLE user(
    id_user INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    age INTEGER
);