CREATE SCHEMA bootsinc;
-- DROP SCHEMA bootsinc;
USE bootsinc;

CREATE TABLE produto (
	codProduto INT NOT NULL AUTO_INCREMENT,
	descricao VARCHAR(30) NOT NULL,
	preco DECIMAL(6,2) NOT NULL,
    tamanho INT UNSIGNED NOT NULL,
    quantidadeEstoque INT UNSIGNED NOT NULL,
	UNIQUE INDEX codProduto_UNIQUE (codProduto ASC) VISIBLE,
	PRIMARY KEY (codProduto)
);

CREATE TABLE cliente (
	idCliente INT NOT NULL,
    cpf CHAR(11) NOT NULL,
	primeiroNome VARCHAR(30) NOT NULL,
	sobrenome VARCHAR(70) NOT NULL,
    endereco VARCHAR(70) NOT NULL,
    numCompras INT UNSIGNED DEFAULT 0,
	PRIMARY KEY (idCliente),
	UNIQUE INDEX cpf_UNIQUE (cpf ASC) VISIBLE
);

CREATE TABLE vendedor (
	cpf CHAR(11) NOT NULL,
    primeiroNome VARCHAR(30) NOT NULL,
	sobrenome VARCHAR(70) NOT NULL,
    endereco VARCHAR(70) NOT NULL,
    salario DECIMAL(6,2) NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    numVendas INT UNSIGNED,
    UNIQUE INDEX cpf_UNIQUE (cpf ASC) VISIBLE,
    PRIMARY KEY (cpf)
);

CREATE TABLE caixa (
	cpf CHAR(11) NOT NULL,
    primeiroNome VARCHAR(30) NOT NULL,
	sobrenome VARCHAR(70) NOT NULL,
    endereco VARCHAR(70) NOT NULL,
    salario DECIMAL(6,2) NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    numCaixa INT UNSIGNED NOT NULL,
    UNIQUE INDEX cpf_UNIQUE (cpf ASC) VISIBLE,
    PRIMARY KEY (cpf)
);

CREATE TABLE pedido (
	idPedido INT UNSIGNED AUTO_INCREMENT,
    idProduto INT NOT NULL,
    quantidade INT UNSIGNED,
    preco DECIMAL(6,2) NOT NULL,
    valorPedido DECIMAL(6,2) AS (preco*quantidade) NOT NULL DEFAULT 0.00,
    UNIQUE INDEX idPedido_UNIQUE (idPedido ASC) VISIBLE,
    PRIMARY KEY (idPedido),
    FOREIGN KEY (idProduto)
	REFERENCES produto (codProduto)
);

-- Valor do pedido
DELIMITER //
CREATE TRIGGER valorPedido
AFTER INSERT ON pedido
FOR EACH ROW
BEGIN
	UPDATE Pedido P
	SET P.valorPedido = P.valorPedido + P.quantidade * produto.preco
	WHERE P.numPedido = NEW.numPedido;
END //
DELIMITER ;

CREATE TABLE venda (
	idVenda INT UNSIGNED AUTO_INCREMENT,
    idPedido INT UNSIGNED,
    quantidade INT UNSIGNED NOT NULL,
    valorPedido DECIMAL(6,2) NOT NULL DEFAULT 0.00,
    cpfCliente CHAR(11) NOT NULL,
    cpfVendedor CHAR(11) NOT NULL,
    cpfCaixa CHAR(11) NOT NULL,
    
    UNIQUE INDEX idVenda_UNIQUE (idVenda ASC) VISIBLE,
    PRIMARY KEY (idVenda),
    FOREIGN KEY (idPedido)
	REFERENCES pedido (idPedido),
    FOREIGN KEY (quantidade)
	REFERENCES produto (quantidadeEstoque),
    FOREIGN KEY (valorPedido)
	REFERENCES pedido (valorPedido),
    FOREIGN KEY (cpfCliente)
	REFERENCES cliente (cpf),
    FOREIGN KEY (cpfVendedor)
	REFERENCES vendedor (cpf),
    FOREIGN KEY (cpfCaixa)
	REFERENCES caixa (cpf)
);

-- Baixar estoque após venda
DELIMITER //
CREATE TRIGGER baixarEstoque
AFTER INSERT ON venda
FOR EACH ROW
BEGIN
	UPDATE produto P
	SET P.quantidadeEstoque = P.quantidadeEstoque - P.quantidade
	WHERE P.idProduto = PR.codProduto;
END //
DELIMITER ;

-- Aumenta compras de cliente
DELIMITER //
CREATE TRIGGER comprasCliente
AFTER INSERT ON venda
FOR EACH ROW
BEGIN
	UPDATE cliente C
    SET C.numCompras = C.numCompras + 1
	WHERE C.cpf = NEW.cpfCliente;
END //
DELIMITER ;

-- Aumenta número de vendas do vendedor
DELIMITER //
CREATE TRIGGER vendasVendedor
AFTER INSERT ON venda
FOR EACH ROW
BEGIN
	UPDATE vendedor V
    SET V.numVendas = V.numVendas + 1
	WHERE V.cpf = NEW.cpfVendedor;
END //
DELIMITER ;



INSERT INTO produto (codProduto, descricao, preco, tamanho, quantidadeEstoque)
VALUES ("1", "sapato nike", "100.50", "36", "10");

INSERT INTO pedido (idProduto, quantidade)
VALUES (1, 2);

INSERT INTO cliente (idCliente, cpf, primeiroNome, sobrenome, endereco) 
VALUES ('23', '23232323232', 'jogao', 'couves', 'casa dele');

INSERT INTO venda (idPedido , cpfCliente, cpfVendedor, cpfCaixa)
VALUES (1, 11111111111, 88888888888, 77777777777);