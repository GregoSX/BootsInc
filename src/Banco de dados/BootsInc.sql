CREATE SCHEMA bootsinc;
-- DROP SCHEMA bootsinc;
USE bootsinc;

CREATE TABLE produto (
	codProduto INT NOT NULL AUTO_INCREMENT,
	descricao VARCHAR(30) NOT NULL,
	preco DECIMAL(6,2) NOT NULL,
    tamanho INT NOT NULL,
    quantidadeEstoque INT NOT NULL,
	UNIQUE INDEX codProduto_UNIQUE (codProduto ASC) VISIBLE,
	PRIMARY KEY (codProduto)
);

CREATE TABLE cliente (
	idCliente INT NOT NULL,
    cpf CHAR(11) NOT NULL,
	primeiroNome VARCHAR(30) NOT NULL,
	sobrenome VARCHAR(70) NOT NULL,
    endereco VARCHAR(70) NOT NULL,
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
    idProduto INT UNSIGNED,
    quantidade INT UNSIGNED,
    valorPedido DECIMAL(6,2) NOT NULL DEFAULT 0.00,
    UNIQUE INDEX idPedido_UNIQUE (idPedido ASC) VISIBLE,
    PRIMARY KEY (idPedido)
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
    cpfCliente CHAR(11) NOT NULL,
    cpfFuncionario CHAR(11) NOT NULL,
    UNIQUE INDEX idVenda_UNIQUE (idVenda ASC) VISIBLE,
    PRIMARY KEY (idVenda)
);

-- Baixar estoque após venda
DELIMITER //
CREATE TRIGGER baixarEstoque
AFTER INSERT ON venda
FOR EACH ROW
BEGIN
	UPDATE pedido P, produto PR
	SET Pr.quantidadeEstoque = Pr.quantidadeEstoque - P.quantidade
	WHERE P.idProduto = PR.codProduto;
END //
DELIMITER ;

-- Efetuar uma venda
DELIMITER //
CREATE TRIGGER efetuarVendavenda
AFTER INSERT ON venda
FOR EACH ROW
BEGIN
	DELETE
    FROM pedido
	WHERE venda.idPedido = pedido.idPedido;
END //
DELIMITER ;

INSERT INTO produto (codProduto, descricao, preco, tamanho, quantidadeEstoque)
VALUES ("1", "sapato nike", "100.50", "36", "10");

INSERT INTO pedido (idProduto, quantidade)
VALUES (1, 2);

INSERT INTO venda (idPedido , cpfCliente, cpfFuncionario)
VALUES (1, 2, 2);