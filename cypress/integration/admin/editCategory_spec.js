describe('edit category', () => {
    beforeEach(() => {
        cy.adminLogin()

        cy.visit('http://localhost:8888/webflix/viewCat.php')


        //cy.get(':nth-child(16) > [style="width: 18rem;"] > .card > .btn').click()
    })


    it('it successfully updates data', () => {
        cy.get(':nth-child(5) > .btn').click()
        cy.get('.form-control').clear()
        cy.get('.form-control').invoke('val', 'Animals')

        cy.get('.btn-lg').click()

        cy.get(':nth-child(5) > p').contains('Nature').should('not.exist')

    })

    it('it successfully deletes category', () => {
        cy.get(':nth-child(1) > .btn').click()
        cy.get('a.btn').click()


        cy.get(':nth-child(1) > p').contains('Nature').should('not.exist')

    })

})
