const slides = document.querySelectorAll(".slide");

let currentSlide = 0;

function changeSlide() {
    const current = slides[currentSlide];

    currentSlide = (currentSlide + 1) % slides.length;

    const next = slides[currentSlide];

    next.classList.add("active");

    setTimeout(() => {
        current.classList.remove("active");
    }, 1000);
}

setInterval(changeSlide, 4000);