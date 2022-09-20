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
    precoVendido DECIMAL(6,2) NOT NULL,
    UNIQUE INDEX idPedido_UNIQUE (idPedido ASC) VISIBLE,
    PRIMARY KEY (idProduto, idPedido),
    CONSTRAINT
    FOREIGN KEY (idProduto)
	REFERENCES produto (codProduto)
    ON DELETE RESTRICT
	ON UPDATE RESTRICT
);

CREATE TABLE venda (
	idVenda INT UNSIGNED AUTO_INCREMENT,
    idPedido INT UNSIGNED NOT NULL,
    valorVenda DECIMAL(6,2) NOT NULL DEFAULT 0.00,
    cpfCliente CHAR(11) NOT NULL,
    
    UNIQUE INDEX idVenda_UNIQUE (idVenda ASC) VISIBLE,
    PRIMARY KEY (idVenda),
    FOREIGN KEY (idPedido)
	REFERENCES pedido (idPedido),
    FOREIGN KEY (cpfCliente)
	REFERENCES cliente (cpf)
);

-- Baixar estoque após um pedido
DELIMITER //
CREATE TRIGGER baixarEstoque
AFTER INSERT ON pedido
FOR EACH ROW
BEGIN
	UPDATE produto P
	SET P.quantidadeEstoque = P.quantidadeEstoque - NEW.quantidade
	WHERE P.codProduto = NEW.idProduto;
END //
DELIMITER ;

-- Aumenta o estoque após excluir um pedido
DELIMITER //
CREATE TRIGGER reporEstoque
AFTER DELETE ON pedido
FOR EACH ROW
BEGIN
	UPDATE produto P
	SET P.quantidadeEstoque = P.quantidadeEstoque + OLD.quantidade
	WHERE P.codProduto = OLD.idProduto;
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

-- Efetuar uma venda exclui um pedido
DELIMITER //
CREATE TRIGGER fecharPedido
AFTER INSERT ON venda
FOR EACH ROW
BEGIN
	DELETE FROM pedido P
	WHERE P.idPedido = NEW.idPedido;
END //
DELIMITER ;

-- Para atualizar o valor total da venda de acordo com os produtos no pedido.
DELIMITER //
CREATE TRIGGER valorVenda
AFTER INSERT ON Pedido
FOR EACH ROW
BEGIN
	UPDATE Venda V
	SET V.valorVenda = V.valorVenda + NEW.quantidade * New.precoVendido
	WHERE V.idPedido = NEW.idPedido;
END //
DELIMITER ;

INSERT INTO pedido (idPedido, idProduto, quantidade, precoVendido)
VALUES (1, 1, 1, 1.00);

