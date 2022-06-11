// JavaScript source code
let slideIndex = 1;
let activePopup = 0;

function setActivePopup(newActivePopup) {
    activePopup = newActivePopup;
    slideIndex = 1;
    showSlides(0);
}

function showSlides(incrementValue) {
    slideIndex += incrementValue
    let slides = document.querySelectorAll(`div[data-group="${activePopup}"]`);
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    if (slideIndex < 1) {
        slideIndex = slides.length
    }
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
}