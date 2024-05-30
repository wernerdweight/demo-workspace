window.addEventListener('scroll', function() {
    const nav = document.getElementById('main-nav');
    
    if (window.scrollY > 50) {  // Adjust the scroll value as needed
        nav.classList.add('small');
    } else {
        nav.classList.remove('small');
    }
});