describe('Register', () => {
    beforeEach(() => {
        cy.visit('http://localhost:8888/webflix/adminRegister.php')
    
})

//check to see if first name input has a HTML required attribute -> forcing user to input first name
it('requires first name', () => {
    cy.get('#reg_form').within(() => {
        cy.get('[name="first_name"]').then($el => $el[0].checkValidity()).should('be.false')
    })

})

//check to see if last name input has a HTML required attribute -> forcing user to input last name
it('requires last name', () => {
    cy.get('#reg_form').within(() => {
        cy.get('[name="last_name"]').then($el => $el[0].checkValidity()).should('be.false')
    })

})

//check to see if DoB input has a HTML required attribute -> forcing user to input DoB
it('requires valid email', () => {
    cy.get('#reg_form').within(() => {
        cy.get(':nth-child(3) > .form-control').then($el => $el[0].checkValidity()).should('be.false')
    })

})

//check to see if phone number input has a HTML required attribute -> forcing user to input phone number
it('requires password', () => {
    cy.get('#reg_form').within(() => {
        cy.get(':nth-child(4) > .form-control').then($el => $el[0].checkValidity()).should('be.false')
    })

})

//check to see if password input has a HTML required attribute -> forcing user to input password
it('requires input password', () => {
    cy.get('#reg_form').within(() => {
        cy.get(':nth-child(5) > .form-control').then($el => $el[0].checkValidity()).should('be.false')
    })

})

//check to see if security question input has a HTML required attribute -> forcing user to input security question
it('requires input security question', () => {
    cy.get('#reg_form').within(() => {
        cy.get(':nth-child(6) > .form-control').then($el => $el[0].checkValidity()).should('be.false')
    })

})


//check to see if security answer input has a HTML required attribute -> forcing user to input security answer
it('requires input security answer', () => {
    cy.get('#reg_form').within(() => {
        cy.get(':nth-child(7) > .form-control').then($el => $el[0].checkValidity()).should('be.false')
    })

})

//check to see if passwords input have to match
it('requires passwords match', () => {
    cy.get('[name="first_name"]').invoke('val', 'Cypress')
    cy.get('[name="last_name"]').invoke('val', 'Testing')
    cy.get(':nth-child(3) > .form-control').invoke('val', 'exampleEmail@cypress.com')
    cy.get(':nth-child(4) > .form-control').invoke('val', '1')
    cy.get(':nth-child(5) > .form-control').invoke('val', '2')
    cy.get(':nth-child(6) > .form-control').invoke('val', 'Question')
    cy.get(':nth-child(7) > .form-control').invoke('val', 'Answer')
    cy.get('.btn').click()

    cy.get('#err_msg')
    
           .should('have.text', 'The following error(s) occurred: - Passwords do not match.Please try again.')

})

//check to see if system registers and redirects user successfully
it('redirects to admin home on successful registration', () => {
    cy.get('[name="first_name"]').invoke('val', 'Cypress')
    cy.get('[name="last_name"]').invoke('val', 'Testing')
    cy.get(':nth-child(3) > .form-control').invoke('val', 'exampleEmail@cypress.com')
    cy.get(':nth-child(4) > .form-control').invoke('val', '1')
    cy.get(':nth-child(5) > .form-control').invoke('val', '1')
    cy.get(':nth-child(6) > .form-control').invoke('val', 'Question')
    cy.get(':nth-child(7) > .form-control').invoke('val', 'Answer')
    cy.get('.btn').click()

    cy.get('h1')
    .should('have.text', "Admin Homepage")

})

})