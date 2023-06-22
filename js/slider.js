let slideIndex = 0;
let textIndex = 0;
showSlide(slideIndex, textIndex);

function changeSlide(n) {
  showSlide(slideIndex += n, textIndex += n);
}

function showSlide(n, t) {
  const slides = document.getElementsByClassName("slide");
  const text = document.getElementsByClassName("slide-content");

  if (n >= slides.length) {
    slideIndex = 0;
  }
  if (n < 0) {
    slideIndex = slides.length - 1;
  }
  if (t >= text.length) {
    textIndex = 0;
  }
  if (t < 0) {
    textIndex = text.length - 1;
  }

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (let i = 0; i < text.length; i++) {
    text[i].style.display = "none";
  }

  slides[slideIndex].style.display = "block";
  text[textIndex].style.display = "block";
}