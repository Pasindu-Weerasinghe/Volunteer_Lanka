const images = JSON.parse(document.querySelector('input[name="imagesArray"]').value);

const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');

let currentSlide = 0;
showSlide(currentSlide);

if(images.length === 1) {
    document.querySelector('.prevBtn').style.display = 'none';
    document.querySelector('.nextBtn').style.display = 'none';
    // document.querySelector('.dots').style.display = 'none';
}

function moveSlide(n) {
    showSlide(currentSlide += n);
}

function setSlide(n) {
    showSlide(currentSlide = n);
}


function showSlide(n) {
    let i;

    if (n > slides.length - 1) {
        currentSlide = 0;
    } else if (n < 0) {
        currentSlide = slides.length - 1;
    }

    for(i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }

    for(i = 0; i < dots.length; i++) {
        dots[i].classList.remove('active');
    }

    slides[currentSlide].style.display = 'block';
    dots[currentSlide].classList.add('active');
}

window.moveSlide = moveSlide;
window.setSlide = setSlide;
window.showSlide = showSlide;