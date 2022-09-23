CREATE SCHEMA bootsinc;

USE bootsinc;

CREATE TABLE produto (
	codigo INT NOT NULL PRIMARY KEY,
	descricao VARCHAR(30) NOT NULL,
	preco DECIMAL(6,2) NOT NULL,
    tamanho INT UNSIGNED NOT NULL
);

CREATE TABLE cliente (
    cpf CHAR(11) NOT NULL PRIMARY KEY,
	primeiroNome VARCHAR(30) NOT NULL,
	sobrenome VARCHAR(70) NOT NULL,
    endereco VARCHAR(70) NOT NULL,
    numCompras INT UNSIGNED DEFAULT 0
);

CREATE TABLE vendedor (
	cpf CHAR(11) NOT NULL PRIMARY KEY,
    primeiroNome VARCHAR(30) NOT NULL,
	sobrenome VARCHAR(70) NOT NULL,
    endereco VARCHAR(70) NOT NULL,
    salario DECIMAL(6,2) NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    numVendas INT UNSIGNED DEFAULT 0,
    totalVendido DECIMAL(9,2) NOT NULL DEFAULT 0.00
);

CREATE TABLE caixa (
	cpf CHAR(11) NOT NULL PRIMARY KEY,
    primeiroNome VARCHAR(30) NOT NULL,
	sobrenome VARCHAR(70) NOT NULL,
    endereco VARCHAR(70) NOT NULL,
    salario DECIMAL(6,2) NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    numCaixa INT UNSIGNED NOT NULL
);

CREATE TABLE pedido (
    numero INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    codProduto INT NOT NULL,
    quantidade INT UNSIGNED,
    valor DECIMAL(9,2) NOT NULL DEFAULT 0.00,
    status VARCHAR(11) NOT NULL DEFAULT "Pendente",

    CONSTRAINT fk_produto
    FOREIGN KEY (codProduto)
    REFERENCES produto (codigo)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
);

CREATE TABLE venda (
    numero INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    numPedido INT UNSIGNED NOT NULL,
    valorPedido DECIMAL(9,2) NOT NULL DEFAULT 0.00,
    desconto INT UNSIGNED NOT NULL,
    valorVenda DECIMAL(9,2) NOT NULL DEFAULT 0.00,
    cpfCliente CHAR(11) NOT NULL,
    cpfVendedor CHAR(11) NOT NULL,

    CONSTRAINT fk_pedido
    FOREIGN KEY (numPedido)
    REFERENCES pedido (numero)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
    CONSTRAINT fk_vendedor
    FOREIGN KEY (cpfVendedor)
    REFERENCES vendedor (cpf)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
    CONSTRAINT fk_cliente
    FOREIGN KEY (cpfCliente)
    REFERENCES cliente (cpf)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT
);

-- Exemplos --

/*

INSERT INTO vendedor (cpf, primeiroNome, sobrenome, endereco, salario, telefone)
VALUES ('12345678910', 'Nathan', 'Patrocinio', 'Jardim Aeroporto', 2000.00, 3599998888);

INSERT INTO cliente (cpf, primeiroNome, sobrenome, endereco)
VALUES ('47474747474', 'Lucas', 'Pinheiro', 'Texas 10');

INSERT INTO produto (codigo, descricao, preco, tamanho)
VALUES ('123', 'Tênis Nike Masculino', 300.00, 40);

*/ 
