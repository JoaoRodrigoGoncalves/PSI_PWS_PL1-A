DROP DATABASE IF EXISTS faturamais;
CREATE DATABASE faturamais;
USE faturamais;

CREATE TABLE users
(
		id INTEGER PRIMARY KEY AUTO_INCREMENT,
        ativo BIT DEFAULT 1 NOT NULL,
        username VARCHAR(100) NOT NULL,
        password VARCHAR(100) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        telefone CHAR(9) NOT NULL,
        nif CHAR(9) UNIQUE NOT NULL,
        morada VARCHAR(100) NOT NULL,
        codigoPostal CHAR(8) NOT NULL,
        localidade VARCHAR(40) NOT NULL,
        role INT(2) DEFAULT 0 NOT NULL -- 0 -> normal, 1 -> funcionario, 2 -> admin
)ENGINE=InnoDB;

CREATE TABLE empresas
(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
    designacaoSocial VARCHAR(100) NOT NULL,
    capitalSocial FLOAT NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone CHAR(9) NOT NULL,
    nif CHAR(9) UNIQUE NOT NULL,
    morada VARCHAR(100) NOT NULL,
    codigoPostal CHAR(8) NOT NULL,
    localidade VARCHAR(40) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE estados
(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
    estado VARCHAR(30) UNIQUE NOT NULL
)ENGINE=InnoDB;

CREATE TABLE faturas
(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
    data DATETIME NOT NULL DEFAULT now(),
    observacoes TEXT NOT NULL,
    estado_id INTEGER NOT NULL,
    cliente_id INTEGER NOT NULL,
    funcionario_id INTEGER NOT NULL,
    CONSTRAINT IDCLIENTE_FK FOREIGN KEY(cliente_id) REFERENCES users(id),
    CONSTRAINT IDFUNCIONARIO_FK FOREIGN KEY(funcionario_id) REFERENCES users(id)
)ENGINE=InnoDB;

CREATE TABLE taxas
(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
    valor INTEGER NOT NULL, -- guarda-se o valor completo e no código divide-se por 100 para contas, caso necessário
    descricao VARCHAR(100) NOT NULL,
    emVigor BIT DEFAULT 0 NOT NULL
)ENGINE=InnoDB;

CREATE TABLE unidades
(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
    unidade VARCHAR(10) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE produtos
(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
    ativo BIT DEFAULT 1 NOT NULL,
    descricao VARCHAR(100) NOT NULL,
    preco_unitario DECIMAL(10, 2) NOT NULL,
    iva_id INTEGER NOT NULL,
    unidade_id INTEGER NOT NULL,
    stock FLOAT NOT NULL,
    CONSTRAINT IDIVA_P_FK FOREIGN KEY(iva_id) REFERENCES faturas(id),
    CONSTRAINT IDUNIDADE_FK FOREIGN KEY(unidade_id) REFERENCES unidades(id)
)ENGINE=InnoDB;

CREATE TABLE linhas_faturas
(
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
    fatura_id INTEGER NOT NULL,
    produto_id INTEGER NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    iva_id INTEGER NOT NULL,
    CONSTRAINT IDFATURA_FK FOREIGN KEY(fatura_id) REFERENCES faturas(id),
    CONSTRAINT IDPRODUTO_FK FOREIGN KEY(produto_id) REFERENCES produtos(id),
    CONSTRAINT IDIVA_LF_FK FOREIGN KEY(iva_id) REFERENCES taxas(id)
)ENGINE=InnoDB;