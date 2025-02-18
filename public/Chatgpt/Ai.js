const toggle = document.getElementById('toggleDark');
const body = document.querySelector('body');

toggle.addEventListener('click', function () {
    this.classList.toggle('ri-sun-fill');
    if (this.classList.toggle('ri-moon-fill')) {
        body.style.background = 'white';
        body.style.color = 'black';
        body.style.transition = '1s';
    } else {
        body.style.background = 'black';
        body.style.color = 'white';
        body.style.transition = '1s';
    }
})
const hide = document.querySelector('.hamburger');
const show = document.querySelector('#hamb')
show.addEventListener("click", function () {
    hide.classList.remove('hide')


})
document.body.addEventListener("click", function (event) {
    if (!hide.contains(event.target) && event.target !== show) {
        hide.classList.add('hide');
    }
})




