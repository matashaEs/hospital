const buttonNext = document.querySelector('.btn_next');
const buttonPrev = document.querySelector('.btn_prev');
const form = document.querySelector('.form_container');

buttonNext.addEventListener('click', function() {
    form.classList.add('active');
});

buttonPrev.addEventListener('click', function() {
    form.classList.remove('active');
});