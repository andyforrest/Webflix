describe('add new movie to system', () => {
    beforeEach(() => {
        cy.adminLogin()

        cy.get(':nth-child(1) > #navbarDropdownMenuLink').click()
        cy.get('[href="adminMovies.php"]').click()
        cy.get('[href="addMovie.php"]').click()

        //cy.get(':nth-child(16) > [style="width: 18rem;"] > .card > .btn').click()
    })
    it('it requires all fields are filled with valid data', () => {
        cy.get('.card-body').within(() => {
            cy.get('#message').then($el => $el[0].checkValidity()).should('be.false')
            cy.get(':nth-child(2) > .form-control').then($el => $el[0].checkValidity()).should('be.false')

            cy.get('#further_info').then($el => $el[0].checkValidity()).should('be.false')
            cy.get(':nth-child(4) > .form-control').then($el => $el[0].checkValidity()).should('be.false')
            cy.get(':nth-child(6) > .form-control').then($el => $el[0].checkValidity()).should('be.false')
            cy.get(':nth-child(7) > .form-control').then($el => $el[0].checkValidity()).should('be.false')
            cy.get(':nth-child(8) > .form-control').then($el => $el[0].checkValidity()).should('be.false')
    })
})

it('successfully saves movie into system', () => {
    cy.get('#message').invoke('val', 'Cypress Movie')
    cy.get(':nth-child(2) > .form-control').invoke('val', 'Category')
    cy.get('#further_info').invoke('val', 'further info')
    cy.get(':nth-child(4) > .form-control').invoke('val', '2000')
    cy.get(':nth-child(5) > #inputGroupSelect01').select('English')
    cy.get(':nth-child(6) > .form-control').invoke('val', '123')
    cy.get(':nth-child(7) > .form-control').invoke('val', 'image location')
    cy.get(':nth-child(8) > .form-control').invoke('val', 'media location')

    cy.get('.btn').click()

    cy.get('[href="addMovie.php"]')
    .should('have.text', '\n  Add Movie')
})

})