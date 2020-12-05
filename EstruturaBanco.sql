CREATE DATABASE DUDA;
USE DUDA;
CREATE TABLE tb_artistas(
id BIGINT AUTO_INCREMENT,
nome VARCHAR(100),
fg_ativo INTEGER,
CONSTRAINT pk_id_tb_artistas PRIMARY KEY(id)
);

CREATE TABLE tb_estilos(
id BIGINT AUTO_INCREMENT,
estilo VARCHAR(100),
fg_ativo INTEGER,
CONSTRAINT pk_id_tb_estilos PRIMARY KEY(id)
);
CREATE TABLE tb_musicas(
id BIGINT AUTO_INCREMENT,
nome VARCHAR(150) NOT NULL,
id_artista BIGINT,
id_seg_artista BIGINT,
musica longtext NOT NULL,
id_estilo BIGINT,
fg_ativo INTEGER,
CONSTRAINT pk_musica_tb_musicas PRIMARY KEY(id, id_artista),
CONSTRAINT fk_id_artista_tb_musicas_id_tb_artistas FOREIGN KEY(id_artista) REFERENCES tb_artistas(id),
CONSTRAINT fk_id_seg_artista_tb_musicas_id_tb_artistas FOREIGN KEY(id_seg_artista) REFERENCES tb_artistas(id),
CONSTRAINT fk_tb_estilo_tb_musicas_id_tb_estilos FOREIGN KEY(id_estilo) REFERENCES tb_estilos(id)
);

CREATE TABLE tb_play_lists(
id BIGINT AUTO_INCREMENT,
nome VARCHAR(50),
fg_ativo INTEGER,
CONSTRAINT pk_id_tb_play_list PRIMARY KEY(id)
);


CREATE TABLE tb_play_list_musica(
id BIGINT AUTO_INCREMENT,
id_musica BIGINT,
id_play_list BIGINT,
fg_ativo INTEGER,
CONSTRAINT pk_id_musica_id_play_list_tb_play_list_musica PRIMARY KEY(id_musica,id_play_list),
CONSTRAINT fk_id_musica_tb_play_list_musica_id_tb_musica FOREIGN KEY(id_musica) REFERENCES tb_musicas(id),
CONSTRAINT fk_id_play_list_tb_play_list_musica_id_tb_play_lists FOREIGN KEY (id) REFERENCES tb_play_lists(id)
);

INSERT INTO tb_artistas(nome,fg_ativo)
VALUES('Desconhecido',1),
('Pedro Paulo & Alex',1),
('Bruno & Barretto',1),
('Augusto & Atílio',1),
('Marília Mendonça',1),
('Maiara e Maraisa',1),
('Zé Neto e Cristiano',1),
('João Bosco & Vinícius',1),
('Munhoz e Mariano',1);

INSERT INTO tb_artistas(nome,fg_ativo) VALUES('Ghost',1),
('Wesley Safadão',1),
('Gusttavo Lima',1),
('Henrique e Juliano',1);

INSERT INTO tb_artistas(nome,fg_ativo) VALUES('Luiza e Maurilio',1),
('Antony e Gabriel',1);
INSERT INTO tb_estilos(estilo,fg_ativo)
VALUES
('Sertanejo',1),
('Eletronica',1),
('Rock',1),
('Funk',1),
('Classica',1);
