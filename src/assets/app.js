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
    
    if (window.scrollY > 50) {  // Adjust the scroll value as needed
        nav.classList.add('small');
    } else {
        nav.classList.remove('small');
    }
});
