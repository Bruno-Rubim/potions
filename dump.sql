CREATE DATABASE IF NOT EXISTS potion_log;
USE potion_log;

DROP TABLE IF EXISTS pocoes;
DROP TABLE IF EXISTS ingredientes;
DROP TABLE IF EXISTS cores;
DROP TABLE IF EXISTS efeitos;

CREATE TABLE ingredientes ( 
    id int AUTO_INCREMENT NOT NULL, 
    nome varchar(70) NOT NULL,
    imagem varchar(70) NOT NULL,
    CONSTRAINT pk_ingredientes PRIMARY KEY (id) 
);

INSERT INTO ingredientes (nome, imagem) VALUES ('flade', '/img/ingredientes/flade.png');
INSERT INTO ingredientes (nome, imagem) VALUES ('porime', '/img/ingredientes/porime.png');
INSERT INTO ingredientes (nome, imagem) VALUES ('silverium', '/img/ingredientes/silverium.png');
INSERT INTO ingredientes (nome, imagem) VALUES ('syone', '/img/ingredientes/syone.png');
INSERT INTO ingredientes (nome, imagem) VALUES ('tedrust', '/img/ingredientes/tedrust.png');
INSERT INTO ingredientes (nome, imagem) VALUES ('veroot', '/img/ingredientes/veroot.png');

CREATE TABLE cores ( 
    id int AUTO_INCREMENT NOT NULL, 
    nome varchar(70) NOT NULL,
    imagem varchar(70) NOT NULL,
    CONSTRAINT pk_cores PRIMARY KEY (id) 
);

INSERT INTO cores (nome, imagem) VALUES ('ciano', '/img/cores/ciano.png');
INSERT INTO cores (nome, imagem) VALUES ('cinzenta', '/img/cores/cinzenta.png');
INSERT INTO cores (nome, imagem) VALUES ('laranja', '/img/cores/laranja.png');
INSERT INTO cores (nome, imagem) VALUES ('marinho', '/img/cores/marinho.png');
INSERT INTO cores (nome, imagem) VALUES ('marrom', '/img/cores/marrom.png');
INSERT INTO cores (nome, imagem) VALUES ('musgo', '/img/cores/musgo.png');
INSERT INTO cores (nome, imagem) VALUES ('roxo', '/img/cores/roxo.png');
INSERT INTO cores (nome, imagem) VALUES ('salmao', '/img/cores/salmao.png');
INSERT INTO cores (nome, imagem) VALUES ('verde', '/img/cores/verde.png');
INSERT INTO cores (nome, imagem) VALUES ('vinho', '/img/cores/vinho.png');

CREATE TABLE efeitos ( 
    id int AUTO_INCREMENT NOT NULL, 
    nome varchar(70) NOT NULL,
    descricao varchar(255) NOT NULL,
    CONSTRAINT pk_efeitos PRIMARY KEY (id) 
);

INSERT INTO efeitos (nome, descricao) VALUES ('Regeneração', 'Rapidamente recupera a saúde de quem a consumir, o efeito dura 150 segundos com total intensidade');
INSERT INTO efeitos (nome, descricao) VALUES ('Veneno', '');
INSERT INTO efeitos (nome, descricao) VALUES ('Velocidade', '');
INSERT INTO efeitos (nome, descricao) VALUES ('Tontura', '');
INSERT INTO efeitos (nome, descricao) VALUES ('Paralizia', '');
INSERT INTO efeitos (nome, descricao) VALUES ('Queda Leve', '');
INSERT INTO efeitos (nome, descricao) VALUES ('Velocidade', '');
INSERT INTO efeitos (nome, descricao) VALUES ('Estamina', '');
INSERT INTO efeitos (nome, descricao) VALUES ('', '');
INSERT INTO efeitos (nome, descricao) VALUES ('', '');

CREATE TABLE pocoes (
    id int AUTO_INCREMENT NOT NULL, 
    autor varchar(70) NOT NULL, 
    id_efeito INT NOT NULL, 
    intensidade int(3) NOT NULL,
    id_cor int NOT NULL, 
    id_ingrediente int NOT NULL, 
    receita varchar(255) NOT NULL, 
    CONSTRAINT pk_pocoes PRIMARY KEY (id)
);

ALTER TABLE pocoes ADD CONSTRAINT fk_efeito FOREIGN KEY (id_efeito) REFERENCES efeitos (id);
ALTER TABLE pocoes ADD CONSTRAINT fk_cor FOREIGN KEY (id_cor) REFERENCES cores (id);
ALTER TABLE pocoes ADD CONSTRAINT fk_ingrediente FOREIGN KEY (id_ingrediente) REFERENCES ingredientes (id);

INSERT INTO pocoes SET
    autor = "Gandalf",
    id_efeito = 1,
    intensidade = 75,
    id_cor = 1,
    id_ingrediente = 1,
    receita = "enfia tudo no caldeirao e fodase";
