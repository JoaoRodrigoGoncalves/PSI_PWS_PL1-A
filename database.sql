DROP DATABASE IF EXISTS faturamais;
CREATE DATABASE faturamais;
USE faturamais;

CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTO_INCREMENT COMMENT 'Identificador User',
    ativo TINYINT(1) DEFAULT 1 NOT NULL COMMENT 'Estado do utilizador ',
    username VARCHAR(100) NOT NULL COMMENT 'Nome do utilizador',
    password VARCHAR(100) NOT NULL COMMENT 'Password do utilizador',
    email VARCHAR(100) UNIQUE NOT NULL COMMENT 'Email do utilizador',
    telefone CHAR(9) NOT NULL COMMENT 'Telefone do utilizador',
    nif CHAR(9) UNIQUE NOT NULL COMMENT 'Numero de identificação fiscal do utilizador',
    morada VARCHAR(100) NOT NULL COMMENT 'Morada do utilizador',
    codigopostal VARCHAR(8) NOT NULL COMMENT 'Código Postal do Utilizador',
    localidade VARCHAR(40) NOT NULL COMMENT 'Localidade da morada do Utilizador',
    role INT(2) DEFAULT 0 NOT NULL COMMENT 'Posição do utilizador' -- 0 -> Admin | 1 -> Funcionario | 2 -> Cliente 
)  ENGINE=INNODB;

CREATE TABLE empresas (
    id INTEGER AUTO_INCREMENT PRIMARY KEY COMMENT 'Identificação Empresa',
    designacaosocial VARCHAR(100) NOT NULL COMMENT 'Designação Social da Empresa',
    capitalsocial FLOAT NOT NULL COMMENT 'Capital Social da empresa',
    email VARCHAR(100) UNIQUE NOT NULL COMMENT 'Email da empresa',
    telefone CHAR(9) NOT NULL COMMENT 'Telemovel da empresa',
    nif CHAR(9) UNIQUE NOT NULL COMMENT 'Numero de Identificação fiscal da empresa',
    morada VARCHAR(100) NOT NULL COMMENT 'Morada da empresa',
    codigopostal CHAR(8) NOT NULL COMMENT 'Codigo postal da Empresa',
    localidade VARCHAR(40) NOT NULL COMMENT 'Localidade da Empresa'
)  ENGINE=INNODB;

CREATE TABLE estados
(
	id INTEGER not null AUTO_INCREMENT PRIMARY KEY,
    estado VARCHAR(30) UNIQUE NOT NULL
)ENGINE=InnoDB;

CREATE TABLE faturas (
    id INTEGER PRIMARY KEY AUTO_INCREMENT COMMENT 'Identificação fatura',
    data DATETIME NOT NULL DEFAULT NOW() COMMENT 'Data criação fatura',
    observacoes TEXT NOT NULL COMMENT 'Observações da fatura',
    estado_id INTEGER NOT NULL COMMENT 'Identificador do estado da fatura',
    cliente_id INTEGER NOT NULL COMMENT 'Identificador do cliente da fatura',
    funcionario_id INTEGER NOT NULL COMMENT 'Identificador do funcionario da fatura',
    CONSTRAINT IDCLIENTE_FK FOREIGN KEY (cliente_id)
        REFERENCES users (id),
    CONSTRAINT IDFUNCIONARIO_FK FOREIGN KEY (funcionario_id)
        REFERENCES users (id)
)  ENGINE=INNODB;

CREATE TABLE taxas (
    id INTEGER PRIMARY KEY AUTO_INCREMENT COMMENT 'Identificador da Taxa',
    valor INTEGER NOT NULL COMMENT 'Valor da taxa', -- guarda-se o valor completo e no código divide-se por 100 para contas, caso necessário
    descricao VARCHAR(100) NOT NULL COMMENT 'Descrição da taxa',
    emVigor TINYINT(1) DEFAULT 0 NOT NULL COMMENT 'Bool estado em vigor ou não da taxa'
)  ENGINE=INNODB;

CREATE TABLE unidades
(
	id INTEGER PRIMARY KEY AUTO_INCREMENT comment 'Identificador da unidade',
    unidade VARCHAR(10) NOT NULL comment '?'
)ENGINE=InnoDB;

CREATE TABLE produtos (
    id INTEGER PRIMARY KEY AUTO_INCREMENT COMMENT 'Identificador do produto',
    ativo TINYINT(1) DEFAULT 1 NOT NULL COMMENT 'Estado ativo ou não do produto',
    descricao VARCHAR(100) NOT NULL COMMENT 'Descrição do produto',
    preco_unitario DECIMAL(10 , 2 ) NOT NULL COMMENT 'Preço do produto',
    iva_id INTEGER NOT NULL COMMENT 'Identificador do iva do produto',
    unidade_id INTEGER NOT NULL COMMENT 'Identificador tipo de unidade do produto',
    stock FLOAT NOT NULL COMMENT 'Numero de stock do produto',
    CONSTRAINT IDIVA_P_FK FOREIGN KEY (iva_id)
        REFERENCES taxas (id),
    CONSTRAINT IDUNIDADE_FK FOREIGN KEY (unidade_id)
        REFERENCES unidades (id)
)  ENGINE=INNODB;

CREATE TABLE linhas_faturas (
    id INTEGER PRIMARY KEY AUTO_INCREMENT COMMENT 'Identificador da linha de faturas',
    fatura_id INTEGER NOT NULL COMMENT 'Identificador da fatura asociada',
    produto_id INTEGER NOT NULL COMMENT 'Identificador do produto asociado',
    valor DECIMAL(10 , 2 ) NOT NULL COMMENT 'Valor da fatura',
    quantidade int not null default 1 comment 'Quantidade de produto',
    iva_id INTEGER NOT NULL COMMENT 'Identificador do tipo de iva da fatura',
    CONSTRAINT IDFATURA_FK FOREIGN KEY (fatura_id)
        REFERENCES faturas (id),
    CONSTRAINT IDPRODUTO_FK FOREIGN KEY (produto_id)
        REFERENCES produtos (id),
    CONSTRAINT IDIVA_LF_FK FOREIGN KEY (iva_id)
        REFERENCES taxas (id)
)  ENGINE=INNODB;