import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
document.addEventListener ("DOMContentLoaded", event=>{
    const imageWrapper = document.querySelector(".image-wrapper")
    const body = document.body
    console.log(imageWrapper);
    document.addEventListener("scroll", scrollEvent=>{
        const position = window.scrollY;
        if(position>100) {
            imageWrapper.classList.add("scroll")
        } else{
            imageWrapper.classList.remove ("scroll")
        }
    })

    const menuButton = document.querySelector(".menu-button")
    const menu = document.querySelector(".menu")
    menuButton.addEventListener("click", event => {
    event.preventDefault()
    menu.classList.toggle("open")
    })
})
let topbutton = document.getElementById("topbtn")
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        topbutton.style.display = "block";
    } else {
        topbutton.style.display = "none"; 
        }
    }
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}