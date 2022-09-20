/// <reference types="cypress" />

describe('BootsInc', () => { 
    it('devem poder cadastrar um produto', () => {
        cy.visit("http://localhost:8080/BootsInc/src/view/CadastrarProduto.html");

        cy.get("[name=codProduto]").type(2);
        cy.get("[name=descricao]").type("adidas");
        cy.get("[name=preco]").type(2);
        cy.get("[name=tamanho]").type(2);
        cy.get("[name=quantidadeEstoque]").type(2);
    
        cy.get("[type=submit]").click();

    });
    it('devem poder excluir um produto', () => {
        cy.visit('http://localhost:8080/BootsInc/src/controller/controllerProduto/ListarProduto.php');

        cy.get("[value=Excluir]").eq(0).click();
    });
    it('devem poder editar um cliente', () => {
        cy.visit('http://localhost:8080/BootsInc/src/controller/controllerCliente/ListarCliente.php');

        cy.get("[value=Editar]").eq(0).click();

        cy.get("[name=sobrenome]").clear().type("grego");

        cy.get("[type=submit]").click();
    });
});