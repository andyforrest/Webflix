describe('Test system for being a premium subscriber', () => {
    beforeEach(() => {
        cy.login()

        cy.get(':nth-child(16) > [style="width: 18rem;"] > .card > .btn').click()
    })


    //attempt to access premium content with basic subscription
    it('Displays that you are not able to access premium content', () => {
        cy.get('.card-title')
        .should('have.text', 'Sorry, for Premium Subscribers only! Click below to get access now')

    })

    it('allows premium subscribers to access content', () => {
        //cy.get('.form-group > .btn').click()
        cy.get(':nth-child(2) > #navbarDropdownMenuLink')
        cy.get('[href="logout.php"]').click({force: true})
        cy.get(':nth-child(8) > a').click()
        //log into premium account user and attempt to access content
        cy.get('.navbar-brand').click()
        cy.get(':nth-child(2) > .card > .card-body > .btn').click()
        cy.get('#email').invoke('val', 'premiumEmail@cypress.com')
            .should('have.value', 'premiumEmail@cypress.com')
           cy.get('#pass').invoke('val','1')
           cy.get('.modal-footer > .btn').click()
           cy.get('#landing')
           .should('have.text', "What's On")

           cy.get(':nth-child(16) > [style="width: 18rem;"] > .card > .btn').click()
           cy.get(':nth-child(3) > :nth-child(1)')
           .should('have.text', "Watch Now")

        
    })

        

})