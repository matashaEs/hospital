// const buttonNext = document.querySelector('.btn_next');
// const buttonPrev = document.querySelector('.btn_prev');
// const form = document.querySelector('.form_container');

// buttonNext.addEventListener('click', function() {
//     form.classList.add('active');
// });

// buttonPrev.addEventListener('click', function() {
//     form.classList.remove('active');
// });

let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex-1].style.display = "block";
            setTimeout(showSlides, 3000); // Zmiana zdjęcia co 3 sekundy
        }

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }