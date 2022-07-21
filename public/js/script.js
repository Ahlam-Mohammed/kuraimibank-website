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

// ########## hamburger button ##########
function openNav() {
    document.getElementById("nav--mobile").style.width = "100%";
}

function closeNav() {
    document.getElementById("nav--mobile").style.width = "0%";
}

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
const cards = Array.from(document.querySelectorAll(".card-js"));
let timeoutCardId;

function getNext() {
    const activeCard = document.querySelector(".card-js.active");
    const activeIndex = cards.indexOf(activeCard);
    let next;
    if (activeIndex === cards.length - 1) {
        next = cards[0];
    } else {
        next = cards[activeIndex + 1];
    }
    return next;
}

function getPositionCard() {
    const activeCard = document.querySelector(".card-js.active");
    const activeIndex = cards.indexOf(activeCard);
    const next = getNext();
    cards.forEach((card, index) => {
        if (index === activeIndex) {
            card.style.transform = "inherit";
        } else if (card === next) {
            card.style.transform = "scale(0.8) translate(-124%, -12%)";
        } else {
            card.style.transform = "scale(0.8) translate(-124%, -12%)";
        }
        card.addEventListener("transitionend", () => {
            card.classList.remove("card-animation");
        });
    });
}

function getNextCard() {
    clearInterval(timeoutId);
    const current = document.querySelector(".card-js.active");
    const next = getNext();
    if (current.classList.contains("card-animation")) {
        return;
    }
    current.classList.add("card-animation");
    next.classList.add("card-animation");
    current.style.transform = "scale(0.8) translate(-124%, -12%)";
    current.classList.remove("active");
    next.style.transform = "inherit";
    next.classList.add("active");
    getPositionCard();
    getActiveDot();
    autoLoopCard();
}

function getActiveDot() {
    const allDots = document.querySelectorAll(".dot span");
    allDots.forEach((dot) => {
        dot.classList.remove("active");
    });
    const activeCard = document.querySelector(".card-js.active");
    const activeIndex = cards.indexOf(activeCard);
    allDots[activeIndex].classList.add("active");
}

function functionalDots() {
    const allDots = document.querySelectorAll(".dot span");
    allDots.forEach((dot, index) => {
        dot.addEventListener("click", () => {
            getDotCard(index);
        });
    });
}

function getDotCard(index) {
    clearTimeout(timeoutId);
    cards.forEach((card) => {
        card.classList.remove("active");
    });
    const current = cards[index];
    current.classList.add("active");
    getPositionCard();
    getActiveDot();
    autoLoopCard();
}

function autoLoopCard() {
    timeoutCardId = setTimeout(() => {
        getNextCard();
    }, 4000);
}

getActiveDot();
functionalDots();
autoLoopCard();




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

function newsSlide() {
    slides.forEach((slide, index) => {
        if (index === 0) {
            slide.classList.add('slide__next')
        } else if (index === 1) {
            slide.classList.add('slide__center')
        } else if (index === 2) {
            slide.classList.add('slide__prev')
        } else {
            slide.classList.add('slide__out')
        }
    })
}

function getNextPrev() {
    const activeSlide = document.querySelector(".slide-js.slide__center");
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
    const activeSlide = document.querySelector(".slide-js.slide__center");
    const activeIndex = slides.indexOf(activeSlide);
    const [next, prev] = getNextPrev();
    slides.forEach((slide, index) => {
        if (index === activeIndex) {
            slide.className = '';
            slide.classList.add('slide-js slide__center');
        } else if (slide === prev) {
            slide.className = '';
            slide.classList.add('slide-js slide__prev');
        } else if (slide === next) {
            slide.className = '';
            slide.classList.add('slide-js slide__next');
        } else {
            slide.className = '';
            slide.classList.add('slide-js slide__out');
        }
        // slide.addEventListener("transitionend", () => {
        //     slide.classList.remove("top");
        // });
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
    const current = document.querySelector(".slide-js.slide__center");
    const [next, prev] = getNextPrev();
    // if (current.classList.contains("top")) {
    //     return;
    // }
    current.classList.add("top");
    next.classList.add("top");
    prev.classList.add('top');

    current.classList.remove('slide__center');
    current.classList.add('slide__prev');

    next.classList.remove('slide__next');
    next.classList.add('slide__center');

    prev.classList.remove('slide__prev');
    current.classList.add('slide__next');

    // current.style.transform = "translate(-230%)";
    // current.classList.remove("slide__center");
    // next.style.transform = "translateX(-115%)";
    // next.classList.add("slide__center");
    // prev.style.transform = 'translateX(0)';
    // getPosition();
    // getActiveDot();
    autoLoop();
}

function getPrevSlide() {
    clearInterval(timeoutId);
    const current = document.querySelector(".slide__center");
    const [next, prev] = getNextPrev();
    // if (current.classList.contains("top")) {
    //     return;
    // }
    // current.classList.add("top");
    // prev.classList.add("top");

    current.classList.remove('slide__center');
    current.classList.add('slide__next');

    next.classList.remove('slide__next');
    next.classList.add('slide__prev');

    prev.classList.remove('slide__prev');
    current.classList.add('slide__center');

    // current.style.transform = "translate(0)";
    // current.classList.remove("slide__center");
    // prev.style.transform = "translateX(-115%)";
    // prev.classList.add("slide__center");
    // next.style.transform = 'translate(-230%)'
    // getPosition();
    // getActiveDot();
    autoLoop();
}

function autoLoop() {
    timeoutId = setTimeout(() => {
        getNextSlide();
    }, 55000);
}

// getActiveDot();
// functionalDots();
// getPosition()
newsSlide()
autoLoop();


