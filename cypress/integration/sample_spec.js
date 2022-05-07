describe('My First Test', () => {
    it('Does not do much!', () => {
      expect(true).to.equal(true)
    })
  })

  describe('My Second Test', () => {
    it('Visits Webflix landing page', () => {
      cy.visit('http://localhost:8888/webflix/index.php')

      //cy.get(':nth-child(1) > .card > .card-body > .btn').click()
    })
  })