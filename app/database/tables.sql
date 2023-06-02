DROP TABLE IF EXISTS usuarios;

CREATE TABLE IF NOT EXISTS usuarios (
    id              INTEGER PRIMARY KEY,
    nome            TEXT    NOT NULL,
    dataNascimento  TEXT,
);

INSERT INTO usuarios (id, nome, dataNascimento, tipo, ativado) values (1,'teste 1','01-01-2000',1,1);
INSERT INTO usuarios (id, nome, dataNascimento, tipo, ativado) values (2,'teste 2','01-01-2001',1,1);
INSERT INTO usuarios (id, nome, dataNascimento, tipo, ativado) values (3,'teste 3','01-01-2003',1,1);


/** essa tabela deve ser criada antes de veiculos,
pois veiculos depende dela
exemplo de relacionamento UM para MUITOS MODELO x VEICULOS  */
DROP TABLE IF EXISTS capas;
CREATE TABLE IF NOT EXISTS capas (
    id              INTEGER PRIMARY KEY,
    capa          TEXT    NOT NULL
);

INSERT INTO capas (id, capa) values (1,'Capa Hardback');
INSERT INTO capas (id, capa) values (2,'Capa Paperback');
INSERT INTO capas (id, capa) values (3,'Capa Canoa');



DROP TABLE IF EXISTS livros;

CREATE TABLE IF NOT EXISTS livros (
    id              INTEGER PRIMARY KEY,
    nome_livro      TEXT    NOT NULL,
    capa_id         INTEGER,
    nome_autor      TEXT NOT NULL,
    ano             INTEGER,
    /* definicao de chave estrangeira */
    FOREIGN KEY (capa_id)
    REFERENCES capas (id)
);

/** essa tabela deve ser criada depois de veiculos e usuarios,
exemplo de relacionamento MUITOS para MUITOS USUARIOS x VEICULOS */

DROP TABLE IF EXISTS leitores;
CREATE TABLE IF NOT EXISTS leitores (
    id      INTEGER PRIMARY KEY,
    usuario_id      TEXT    NOT NULL,
    livro_id      TEXT    NOT NULL,
    /* definicao de chave estrangeira */
    FOREIGN KEY (usuario_id)
       REFERENCES usuarios (id),
    FOREIGN KEY (livro_id)
       REFERENCES livros (id)
);
 