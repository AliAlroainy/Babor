// input-babor-test.js created with Cypress
//
// Start writing your Cypress tests below!
// If you're unfamiliar with how Cypress works,
// check out the link below and learn how to write your first test:
// https://on.cypress.io/writing-first-test
describe('The Home Page', () => {
    it('successfully loads', () => {
      cy.visit('http://localhost:8000') // change URL to match your dev URL
    })
  })
