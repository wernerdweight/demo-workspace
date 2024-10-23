const sideLinksId = ['settings', 'home', 'personal', 'work', 'search']

sideLinksId.forEach ((sideLinkId) => {
    const url = '/Users/lukasvoplakal/coding-school/demo-workspace/project/html/img/'
    document.querySelector('#' + sideLinkId + '_icon').addEventListener('mouseenter', function() {
        this.src = url + sideLinkId + '.svg'
    });
    document.querySelector('#' + sideLinkId + '_icon').addEventListener('mouseleave', function() {
        this.src = url + sideLinkId + '_hover' + '.svg'
    });
});

// document.querySelector('#settings_icon').addEventListener('mouseenter', function() {
//     this.src = '/Users/lukasvoplakal/coding-school/demo-workspace/project/html/img/settings.svg';
// });

// document.querySelector('#settings_icon').addEventListener('mouseleave', function() {
//     this.src = '/Users/lukasvoplakal/coding-school/demo-workspace/project/html/img/settings_hover.svg';
// });

// document.querySelector('#home_icon').addEventListener('mouseenter', function() {
//     this.src = '/Users/lukasvoplakal/coding-school/demo-workspace/project/html/img/home.svg';
// });

// document.querySelector('#home_icon').addEventListener('mouseleave', function() {
//     this.src = '/Users/lukasvoplakal/coding-school/demo-workspace/project/html/img/home_hover.svg';
// });
// document.querySelector('#personal_icon').addEventListener('mouseenter', function() {
//     this.src = '/Users/lukasvoplakal/coding-school/demo-workspace/project/html/img/personal.svg';
// });

// document.querySelector('#personal_icon').addEventListener('mouseleave', function() {
//     this.src = '/Users/lukasvoplakal/coding-school/demo-workspace/project/html/img/personal_hover.svg';
// });
// document.querySelector('#work_icon').addEventListener('mouseenter', function() {
//     this.src = '/Users/lukasvoplakal/coding-school/demo-workspace/project/html/img/work.svg'; 
// });

// document.querySelector('#work_icon').addEventListener('mouseleave', function() {
//     this.src = '/Users/lukasvoplakal/coding-school/demo-workspace/project/html/img/work_hover.svg';
// });
// document.querySelector('#search_icon').addEventListener('mouseenter', function() {
//     this.src = '/Users/lukasvoplakal/coding-school/demo-workspace/project/html/img/search.svg'; 
// });

// document.querySelector('#search_icon').addEventListener('mouseleave', function() {
//     this.src = '/Users/lukasvoplakal/coding-school/demo-workspace/project/html/img/search_hover.svg';
// });
