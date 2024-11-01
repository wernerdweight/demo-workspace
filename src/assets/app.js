import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

const sideLinksId = ['home', 'task', 'personal', 'work', 'search', 'settings']

sideLinksId.forEach ((sideLinkId) => {
    const url = 'assets/img/'
    document.querySelector('#' + sideLinkId + '_icon').addEventListener('mouseenter', function() {
        this.src = url + sideLinkId + '_hover' + '.svg'
    });
    document.querySelector('#' + sideLinkId + '_icon').addEventListener('mouseleave', function() {
        this.src = url + sideLinkId + '.svg'
    });
});