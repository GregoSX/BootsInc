CREATE SCHEMA bootsinc;

USE bootsinc;

CREATE TABLE produto (
	codigo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	descricao VARCHAR(30) NOT NULL,
	preco DECIMAL(6,2) NOT NULL,
    tamanho INT UNSIGNED NOT NULL,
    quantidadeEstoque INT UNSIGNED NOT NULL
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
    numVendas INT UNSIGNED DEFAULT 0
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
    valor DECIMAL(6,2) NOT NULL DEFAULT 0.00,
    status VARCHAR(11) NOT NULL DEFAULT "Pendente",

    CONSTRAINT fk_produto
    FOREIGN KEY (codProduto)
    REFERENCES produto (codigo)
    ON DELETE RESTRICT
	ON UPDATE RESTRICT
);

/*

-- Calcula valor do pedido
DELIMITER //
CREATE TRIGGER valorPedido
AFTER INSERT ON pedido
FOR EACH ROW
BEGIN
	UPDATE pedido P, produto S
	SET p.valor = p.valor + NEW.quantidade * S.preco
	WHERE S.codigo = NEW.codProduto;
END //
DELIMITER ;

CREATE TABLE venda (
	numVenda INT UNSIGNED AUTO_INCREMENT,
    numPedido INT UNSIGNED NOT NULL,
    valor DECIMAL(6,2) NOT NULL DEFAULT 0.00,
    cpfCliente CHAR(11) NOT NULL,
    cpfVendedor CHAR(11) NOT NULL,

    UNIQUE INDEX numVenda_UNIQUE (numVenda ASC) VISIBLE,
    PRIMARY KEY (numVenda),
    FOREIGN KEY (numPedido) REFERENCES pedido (numPedido),
    FOREIGN KEY (cpfCliente) REFERENCES cliente (cpf),
    FOREIGN KEY (cpfVendedor) REFERENCES vendedor (cpf)
);

-- Baixar estoque após uma venda ser efetuada
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
CREATE TRIGGER aumentaCompraCliente
AFTER INSERT ON venda
FOR EACH ROW
BEGIN
	UPDATE cliente C
    SET C.numCompras = C.numCompras + 1
	WHERE C.cpf = NEW.cpfCliente;
END //
DELIMITER ;

-- Aumenta compras de cliente
DELIMITER //
CREATE TRIGGER aumentaVendaVendedor
AFTER INSERT ON venda
FOR EACH ROW
BEGIN
	UPDATE Vendedor V
    SET V.numVendas = V.numVendas + 1
	WHERE V.cpf = NEW.cpfVendedor;
END //
DELIMITER ;

-- Efetuar uma venda confirma o pedido
DELIMITER //
CREATE TRIGGER fecharPedido
AFTER INSERT ON venda
FOR EACH ROW
BEGIN
	UPDATE Pedido P
	SET P.statusPedido = "Confirmado"
	WHERE P.idPedido = NEW.idPedido;
END //
DELIMITER ;

*/
