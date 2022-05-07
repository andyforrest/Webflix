describe('login', () => {

    
    beforeEach(() => {
        cy.visit('localhost:8888/webflix/index.php')
        cy.get(':nth-child(2) > .card > .card-body > .btn').click()
        cy.get('.modal-footer > .btn').click()
    })

    it('requires email', () => {
        
        
    //check to see if email input has a HTML required attribute -> forcing user to input email
        cy.get('#my_form').within(() => {
            cy.get('#email').then($el => $el[0].checkValidity()).should('be.false')
        })
        
    
    })

    it('requires password', () => {
        
        
        //check to see if password input has a HTML required attribute -> forcing user to input password
            cy.get('#my_form').within(() => {
                cy.get('#pass').then($el => $el[0].checkValidity()).should('be.false')
            })
            
        
        })

        //check to see if form only accepts valid email and password

        it('requires valid username and password', () => {
            cy.get('#email').invoke('val', 'exampleEmail@cypress.com')
            .should('have.value', 'exampleEmail@cypress.com')
           cy.get('#pass').type('invalid')
           cy.get('.modal-footer > .btn').click()
           cy.get('#err_msg')
           .should('have.text', 'Oops! There was a problem: - Email address and password not found.Please try again or Register')
            


        })

        //check to see if form directs to user homepage if correct login details are input

        it('navigates to the user homepage on successful login', () => {

            cy.get('#email').invoke('val', 'exampleEmail@cypress.com')
            .should('have.value', 'exampleEmail@cypress.com')
           cy.get('#pass').invoke('val','1')
           cy.get('.modal-footer > .btn').click()
           cy.get('#landing')
           .should('have.text', "What's On")

        })

    
})