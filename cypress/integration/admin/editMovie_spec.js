describe('edit and delete movie', () => {
    beforeEach(() => {
        cy.adminLogin()

        cy.get(':nth-child(1) > #navbarDropdownMenuLink').click()
        cy.get('[href="adminMovies.php"]').click()


        //cy.get(':nth-child(16) > [style="width: 18rem;"] > .card > .btn').click()
    })


    it('it successfully updates data', () => {
        cy.get(':nth-child(1) > .btn').click()
        cy.get('#message').clear()
        cy.get('#message').invoke('val', 'Cypress Movie')
        
        cy.get(':nth-child(2) > .form-control').clear()
    cy.get(':nth-child(2) > .form-control').invoke('val', 'Category edit')

    cy.get('#further_info').clear()
    cy.get('#further_info').invoke('val', 'further info edit')

    cy.get(':nth-child(4) > .form-control').clear()
    cy.get(':nth-child(4) > .form-control').invoke('val', '2002')


    cy.get(':nth-child(5) > #inputGroupSelect01').select('English')

    cy.get(':nth-child(6) > .form-control').clear()
    cy.get(':nth-child(6) > .form-control').invoke('val', '123')

    cy.get(':nth-child(7) > .form-control').clear()
    cy.get(':nth-child(7) > .form-control').invoke('val', 'image location')

    cy.get(':nth-child(8) > .form-control').clear()
    cy.get(':nth-child(8) > .form-control').invoke('val', 'media location')

    cy.get('#submit').click()
    cy.get(':nth-child(5) > :nth-child(2)').should('have.text', 'Title:  Cypress Movie ')

    })



it('successfully deletes movie from system', () => {
    cy.get(':nth-child(5) > .btn').click()
    cy.get('#delete').click()

    cy.get(':nth-child(5) > :nth-child(2)').contains('Cypress Test').should('not.exist')
    
})

})

