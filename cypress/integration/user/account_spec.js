describe('update user settings', () => {
    beforeEach(() => {
        cy.login()

        cy.visit('http://localhost:8888/webflix/user.php')
    })
    
    it('displays user registration date', () => {
        cy.get(':nth-child(3) > strong')
        .should('have.text', " Registration Date : ")
    })

    it('requires both password fields are filled out', ()=> {
    //check to see if password input has a HTML required attribute -> forcing user to input password
    
    cy.get(':nth-child(1) > .form-control').then($el => $el[0].checkValidity()).should('be.false')



        
    })

    it('requires both password fields match', () => {
        cy.get(':nth-child(3) > .btn').click()
        cy.get(':nth-child(1) > .form-control').invoke('val', 'testPASS')
        cy.get(':nth-child(2) > .form-control').invoke('val','1')
        //cy.get(':nth-child(3) > .form-control').invoke('val','1')

        cy.get('.form-group > .btn').click()
        cy.get('strong')
        .should('have.text', "Error!")
    })

    it('successfully changes the users password', () => {
        cy.get(':nth-child(3) > .btn').click()
        cy.get(':nth-child(1) > .form-control').invoke('val', '123')
        cy.get(':nth-child(2) > .form-control').invoke('val','123')
        //cy.get(':nth-child(3) > .form-control').invoke('val','1')

        cy.get('.form-group > .btn').click()
        cy.get(':nth-child(2) > #navbarDropdownMenuLink')
        cy.get('[href="logout.php"]').click({force: true})
        cy.get('.navbar-brand').click()
        cy.get(':nth-child(2) > .card > .card-body > .btn').click()
        cy.get('#email').invoke('val', 'exampleEmail@cypress.com')
            .should('have.value', 'exampleEmail@cypress.com')
           cy.get('#pass').invoke('val','123')
           cy.get('.modal-footer > .btn').click()
           cy.get('#landing')
           .should('have.text', "What's On")

    })
})