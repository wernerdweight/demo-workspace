import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

console.log('aaaaa')

document.addEventListener('DOMContentLoaded', function() {
    const portfolioMenuItems = document.querySelectorAll('.menu2 a')
    const outerCircle = document.querySelector('.outer-circle')
    const portfolioContainer = document.querySelector('.portfolio-container')
    let currentRotation = 0

    portfolioMenuItems.forEach((item, index) => {
        item.addEventListener('click', function(event) {
          event.preventDefault()
          let rotation = index * -30
          let translation = 1100 + (index * -100)
          if (Math.abs(rotation - currentRotation) > 180) {
            rotation = 360 + rotation
          }
          const parentDiv = item.parentElement.parentElement
          outerCircle.style.transform = 'rotate(' + rotation + 'deg)'
          portfolioContainer.style.transform = 'translate(-' + translation  + 'vw)'
          currentRotation = rotation
        })
    })

    console.log('tttt')
    const hamburgerMenu = document.querySelector('.hamburger-menu')
    const menu = document.querySelector('.menu1')
    hamburgerMenu.addEventListener('click', function() {
      console.log('clicked HB menu')
      event.preventDefault()
      menu.classList.toggle('active')
      hamburgerMenu.classList.toggle('active')
    })
    menu.addEventListener('click', function() {
      console.log('clicked menu')

      menu.classList.remove('active')
      hamburgerMenu.classList.remove('active')
    })
})
