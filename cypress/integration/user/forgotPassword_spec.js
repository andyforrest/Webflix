describe('Forgot Password', () => {
    beforeEach(() => {
        cy.visit('http://localhost:8888/webflix/forgotPassword.php')
        cy.get('.form-control').invoke('val', 'exampleEmail@cypress.com')
        cy.get('.btn').click()
        
    
})



it('requires security answer input field to be filled out', () => {
    
    cy.get('.card-body').within(() => {
        cy.get(':nth-child(5) > .form-control').then($el => $el[0].checkValidity()).should('be.false')
    })

    
})

it('requires the correct security answer to be filled out', () => {

    cy.get(':nth-child(5) > .form-control').invoke('val', 'random')
    cy.get('.btn').click()
    cy.get(':nth-child(11)').should('have.text', 'Details not found. Please try again')

})

it('it accepts correct security answer to proceed to change password', () => {

    cy.get(':nth-child(5) > .form-control').invoke('val', 'Answer')
    cy.get('.btn').click()
    cy.get('.text-center').should('have.text', 'myAccount')

})

})