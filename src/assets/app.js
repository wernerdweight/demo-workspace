import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

window.addEventListener('scroll', function() {
    const nav = document.getElementById('main-nav');

    if (window.scrollY > 50) {
        nav.classList.add('small');
    } else {
        nav.classList.remove('small');
    }
});


document.addEventListener('DOMContentLoaded', function() {
  const questionForm = document.querySelector('[name="question"]')
  questionForm.addEventListener('submit', async function(event) {
    event.preventDefault()

    try {
      const formData = new FormData(questionForm)
      const response = await fetch('/question/add', {
        method: 'POST',
        body: formData
      })
      if (response.status === 200) {
        questionForm.reset()
        const successMessage = document.createElement('p')
        successMessage.textContent = 'Question submitted successfully!'
        successMessage.style.color = 'green'
        questionForm.prepend(successMessage)
      } else {
        const body = await response.json()
        const errorMessage = document.createElement('p')
        errorMessage.textContent = body.message[0].message || 'An error occurred! Please try again.'
        errorMessage.style.color = 'red'
        questionForm.prepend(errorMessage)
      }
    } catch (error) {
      console.log('err', error)
    }
  })
})
