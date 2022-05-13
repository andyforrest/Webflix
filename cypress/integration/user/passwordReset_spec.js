describe('Test system to see if user can reset their password', () => {
    beforeEach(() => {
        cy.login()
        cy.get(':nth-child(2) > #navbarDropdownMenuLink')
        cy.get('[href="user.php"]').click({force: true})
        cy.get(':nth-child(3) > .btn').click()

    })

    //check to see if password input has a HTML required attribute -> forcing user to input password
it('requires input password', () => {
    cy.get('.modal-body').within(() => {
        cy.get(':nth-child(1) > .form-control').then($el => $el[0].checkValidity()).should('be.false')
        cy.get(':nth-child(2) > .form-control').then($el => $el[0].checkValidity()).should('be.false')
    })

})

//check to see if passwords input have to match
it('requires passwords match', () => {
    cy.get(':nth-child(1) > .form-control').invoke('val', '1')
    cy.get(':nth-child(2) > .form-control').invoke('val', '2')
    
    cy.get('.form-group > .btn').click()

    cy.get('p').should('have.text', 'The following error(s) occurred: - Passwords do not match.Please try again.')

})

it('successfully allows user to reset password', () => {
    cy.get(':nth-child(1) > .form-control').invoke('val', '123')
    cy.get(':nth-child(2) > .form-control').invoke('val', '123')
    
    cy.get('.form-group > .btn').click()
    cy.get(':nth-child(2) > #navbarDropdownMenuLink').click()
    cy.get('[href="logout.php"]').click()
    cy.get(':nth-child(8) > a').click()

    cy.get(':nth-child(2) > .card > .card-body > .btn').click()
        cy.get('#email').invoke('val', 'exampleEmail@cypress.com')
            .should('have.value', 'exampleEmail@cypress.com')
           cy.get('#pass').invoke('val','123')
           cy.get('.modal-footer > .btn').click()
           cy.get('#landing')
           .should('have.text', "What's On")

           cy.get(':nth-child(2) > #navbarDropdownMenuLink')
        cy.get('[href="user.php"]').click({force: true})
        cy.get(':nth-child(3) > .btn').click()
        cy.get(':nth-child(1) > .form-control').invoke('val', '1')
    cy.get(':nth-child(2) > .form-control').invoke('val', '1')
    cy.get('.form-group > .btn').click()

})

        

})