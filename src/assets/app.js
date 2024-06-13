import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

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
})
