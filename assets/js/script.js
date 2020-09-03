function dom(el) {
    return document.querySelector(el);
}
const navButton = dom('.nav-button');
const menuxs = dom('.menu-xs');
const closemenuxs = dom('.close-menu-xs');
navButton.addEventListener('click', function () {
    menuxs.classList.toggle('d-block');
});
closemenuxs.addEventListener('click', function () {
    menuxs.classList.toggle('d-block');
});