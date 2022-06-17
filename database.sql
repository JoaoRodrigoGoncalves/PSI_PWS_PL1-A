DROP DATABASE IF EXISTS faturamais;
CREATE DATABASE faturamais;
USE faturamais;

CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    ativo TINYINT(1) DEFAULT 1 NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone CHAR(9) NOT NULL,
    nif CHAR(9) UNIQUE NOT NULL,
    morada VARCHAR(100) NOT NULL,
    codigopostal VARCHAR(8) NOT NULL,
    localidade VARCHAR(40) NOT NULL,
    role VARCHAR(15) DEFAULT 'cliente'
)ENGINE=INNODB;

CREATE TABLE empresas (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    designacaosocial VARCHAR(100) NOT NULL,
    capitalsocial FLOAT NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone CHAR(9) NOT NULL,
    nif CHAR(9) UNIQUE NOT NULL,
    morada VARCHAR(100) NOT NULL,
    codigopostal CHAR(8) NOT NULL,
    localidade VARCHAR(40) NOT NULL
)ENGINE=INNODB;

CREATE TABLE estados
(
	id INTEGER not null AUTO_INCREMENT PRIMARY KEY,
    estado VARCHAR(30) UNIQUE NOT NULL
)ENGINE=InnoDB;

INSERT INTO estados (estado) VALUES -- não mudar ordem destes valores
                        ('Pendente'),
                        ('Finalizada'),
                        ('Anulada');

CREATE TABLE faturas (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    data DATETIME NOT NULL DEFAULT NOW(),
    estado_id INTEGER NOT NULL,
    cliente_id INTEGER NOT NULL,
    funcionario_id INTEGER NOT NULL,
    CONSTRAINT IDCLIENTE_FK FOREIGN KEY (cliente_id)
        REFERENCES users (id),
    CONSTRAINT IDFUNCIONARIO_FK FOREIGN KEY (funcionario_id)
        REFERENCES users (id)
)ENGINE=INNODB;

CREATE TABLE taxas (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    valor INTEGER NOT NULL, -- guarda-se o valor completo e no código divide-se por 100 para contas, caso necessário
    descricao VARCHAR(100) NOT NULL,
    emvigor TINYINT(1) DEFAULT 0 NOT NULL
)ENGINE=INNODB;

INSERT INTO taxas (valor, descricao, emvigor) VALUES
                      (23, 'Taxa Normal', 1),
                      (13, 'Taxa Intermédia', 1),
                      (6, 'Taxa Reduzida', 1),
                      (0, 'Isento', 1);
                      
CREATE TABLE unidades
(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
    unidade VARCHAR(10) NOT NULL
)ENGINE=InnoDB;

INSERT INTO unidades (unidade) VALUES
                         ('Un'),
                         ('Kg'),
                         ('M'),
                         ('M2');

CREATE TABLE produtos (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    ativo TINYINT(1) DEFAULT 1 NOT NULL,
    descricao VARCHAR(100) NOT NULL,
    preco_unitario DECIMAL(10 , 2 ) NOT NULL,
    taxa_id INTEGER NOT NULL,
    unidade_id INTEGER NOT NULL,
    stock FLOAT NOT NULL,
    CONSTRAINT IDTAXA_P_FK FOREIGN KEY (taxa_id)
        REFERENCES taxas (id),
    CONSTRAINT IDUNIDADE_FK FOREIGN KEY (unidade_id)
        REFERENCES unidades (id)
)ENGINE=INNODB;

CREATE TABLE linha_faturas (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    fatura_id INTEGER NOT NULL,
    produto_id INTEGER NOT NULL,
    valor DECIMAL(10 , 2 ) NOT NULL,
    quantidade DECIMAL(10, 2) not null default 1,
    taxa_id INTEGER NOT NULL,
    CONSTRAINT IDFATURA_FK FOREIGN KEY (fatura_id)
        REFERENCES faturas (id),
    CONSTRAINT IDPRODUTO_FK FOREIGN KEY (produto_id)
        REFERENCES produtos (id),
    CONSTRAINT IDIVA_LF_FK FOREIGN KEY (taxa_id)
        REFERENCES taxas (id)
)ENGINE=INNODB;