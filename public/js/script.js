const els = (element) => document.querySelectorAll(element);
const el  = (element) => document.querySelector(element);

// ########## Menu ##########
els('.landing .nav .nav__item').forEach (e => {
    e.addEventListener('click', (e) => {
        e.preventDefault();

        let menu = el('.menu');
        menu.style.display === "none" ?
            menu.style.display = "flex":
            menu.style.display = "none";

    })
});

// ########## Slide ##########
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.querySelectorAll(".slides-js > *");
    let dots = document.querySelectorAll(".dots-js > *");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "flex";
    dots[slideIndex-1].className += " active";
}
