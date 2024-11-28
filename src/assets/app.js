import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

const searchLink = document.querySelector('.search_modal');
const modal = document.querySelector('#searchModal');

const searchHandler = function(e) {
    e.preventDefault();
    modal.showModal();
    console.log('Search icon clicked');
};
setTimeout(() => {
    console.log('Hello from setTimeout');
    searchLink.addEventListener('click', searchHandler);
}, 3000);
