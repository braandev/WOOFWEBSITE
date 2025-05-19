window.addEventListener('DOMContentLoaded', () => {
  const slider = document.querySelector('.hero-slider');
  const totalSlides = slider.children.length;
  let currentIndex = 0;

  function slide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    slider.style.transform = `translateX(-${currentIndex * 33.3333}%)`;
  }

  setInterval(slide, 5000);
});
