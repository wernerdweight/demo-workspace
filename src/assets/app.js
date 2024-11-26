import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

const searchLink = document.querySelector('.sidebar_icon_link');
const modal = document.querySelector('#searchModal');

searchLink.addEventListener('click', function(e) {
    e.preventDefault();
    modal.showModal();
    console.log('Search icon clicked');
});
