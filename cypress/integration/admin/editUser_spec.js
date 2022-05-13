describe('edit user', () => {
    beforeEach(() => {
        cy.adminLogin()

        cy.visit('http://localhost:8888/webflix/viewUsers.php')


        //cy.get(':nth-child(16) > [style="width: 18rem;"] > .card > .btn').click()
    })


    it('it successfully updates data', () => {
        cy.get(':nth-child(1) > .btn').click()
        cy.get(':nth-child(3) > .form-control').clear()
        cy.get(':nth-child(3) > .form-control').invoke('val', 'CypressTest@email.com')

        cy.get('.btn').click()

        cy.get('.container > :nth-child(1) > :nth-child(4)').should('have.text', "Email: CypressTest@email.com")

    })
/*
    it('it successfully deletes category', () => {
        cy.get(':nth-child(1) > .btn').click()
        cy.get('a.btn').click()


        cy.get(':nth-child(1) > p').contains('Nature').should('not.exist')

    })
*/
})