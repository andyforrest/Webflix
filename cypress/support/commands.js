// ***********************************************
// This example commands.js shows you how to
// create various custom commands and overwrite
// existing commands.
//
// For more comprehensive examples of custom
// commands please read more here:
// https://on.cypress.io/custom-commands
// ***********************************************
//
//
// -- This is a parent command --
// Cypress.Commands.add('login', (email, password) => { ... })
//
//
// -- This is a child command --
// Cypress.Commands.add('drag', { prevSubject: 'element'}, (subject, options) => { ... })
//
//
// -- This is a dual command --
// Cypress.Commands.add('dismiss', { prevSubject: 'optional'}, (subject, options) => { ... })
//
//
// -- This will overwrite an existing command --
// Cypress.Commands.overwrite('visit', (originalFn, url, options) => { ... })
Cypress.Commands.add('login', () => {
    cy.visit('localhost:8888/webflix/index.php')
        cy.get(':nth-child(2) > .card > .card-body > .btn').click()
        cy.get('#email').invoke('val', 'exampleEmail@cypress.com')
            .should('have.value', 'exampleEmail@cypress.com')
           cy.get('#pass').invoke('val','1')
           cy.get('.modal-footer > .btn').click()
           cy.get('#landing')
           .should('have.text', "What's On")
})

Cypress.Commands.add('getByTestId', (testid) => {
    return cy.get(`[data-testid=${testId}]`)
  });