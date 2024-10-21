document.querySelector('.setting img').addEventListener('mouseenter', function() {
    this.src = '/Users/lukasvoplakal/coding-school/demo-workspace/project/html/img/settings.svg'; // Cesta k obrázku při hover
});

document.querySelector('.setting img').addEventListener('mouseleave', function() {
    this.src = '/Users/lukasvoplakal/coding-school/demo-workspace/project/html/img/settings_hover.svg'; // Původní obrázek při odchodu
});
