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

// ########## Slide Service ##########
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

// ########## Slide App ##########



// ########## Successfully Section ##########
const number = els('.successfully');
const successfullyBg = el('.successfully__bg');

number.forEach(e => {
    let numberBg= e.querySelector('.successfully__number b').innerText

    e.addEventListener("mouseover", v => {
        successfullyBg.innerHTML = `<span>+ <b>${numberBg}</b></span>`
    })
})



// ########## Slide News ##########
const slides = Array.from(document.querySelectorAll(".slide-js"));
const buttons = document.querySelectorAll(".buttons");
// const dotsEl = document.querySelector(".dots");
let timeoutId;

function getNextPrev() {
    const activeSlide = document.querySelector(".slide-js.active");
    const activeIndex = slides.indexOf(activeSlide);
    let next, prev;
    if (activeIndex === slides.length - 1) {
        next = slides[0];
    } else {
        next = slides[activeIndex + 1];
    }
    if (activeIndex === 0) {
        prev = slides[slides.length - 1];
    } else {
        prev = slides[activeIndex - 1];
    }
    return [next, prev];
}

function getPosition() {
    const activeSlide = document.querySelector(".slide-js.active");
    const activeIndex = slides.indexOf(activeSlide);
    const [next, prev] = getNextPrev();
    slides.forEach((slide, index) => {
        if (index === activeIndex) {
            slide.style.transform = "translateX(-115%)";
        } else if (slide === prev) {
            slide.style.transform = "translateX(-230%)";
        } else if (slide === next) {
            slide.style.transform = "translateX(0)";
        } else {
            slide.style.transform = "translateX(100%)";
        }
        slide.addEventListener("transitionend", () => {
            slide.classList.remove("top");
        });
    });
}

buttons.forEach((button) => {
    button.addEventListener("click", () => {
        if (button.classList.contains("next")) getNextSlide();
        else if (button.classList.contains("prev")) getPrevSlide();
    });
});

function getNextSlide() {
    clearInterval(timeoutId);
    const current = document.querySelector(".slide-js.active");
    const [next, prev] = getNextPrev();
    if (current.classList.contains("top")) {
        return;
    }
    current.classList.add("top");
    next.classList.add("top");
    current.style.transform = "translate(-230%)";
    current.classList.remove("active");
    next.style.transform = "translateX(-115%)";
    next.classList.add("active");
    prev.style.transform = 'translateX(0)';
    getPosition();
    // getActiveDot();
    autoLoop();
}

function getPrevSlide() {
    clearInterval(timeoutId);
    const current = document.querySelector(".active");
    const [next, prev] = getNextPrev();
    current.classList.add("top");
    prev.classList.add("top");
    current.style.transform = "translate(0)";
    current.classList.remove("active");
    prev.style.transform = "translateX(-115%)";
    prev.classList.add("active");
    next.style.transform = 'translate(-230%)'
    getPosition();
    // getActiveDot();
    autoLoop();
}

function autoLoop() {
    timeoutId = setTimeout(() => {
        getNextSlide();
    }, 5000);
}

// getActiveDot();
// functionalDots();
autoLoop();

