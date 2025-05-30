document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".hero-carousel .slides img");
    const dotsContainer = document.querySelector(".carousel-controls .dots");
    const pauseBtn = document.getElementById("pauseBtn");
  
    let current = 0;
    let isPaused = false;
    let interval;
  
    slides.forEach((_, idx) => {
      const dot = document.createElement("button");
      dot.addEventListener("click", () => showSlide(idx));
      dotsContainer.appendChild(dot);
    });
  
    const dots = dotsContainer.querySelectorAll("button");
  
    function showSlide(index) {
      const slideContainer = document.querySelector(".hero-carousel .slides");
      slideContainer.style.transform = `translateX(-${index * 100}%)`;
      current = index;
  
      dots.forEach(dot => dot.classList.remove("active"));
      dots[index].classList.add("active");
    }
  
    function nextSlide() {
      showSlide((current + 1) % slides.length);
    }
  
    function startCarousel() {
      interval = setInterval(nextSlide, 6000);
    }
  
    function stopCarousel() {
      clearInterval(interval);
    }
  
    pauseBtn.addEventListener("click", () => {
      isPaused = !isPaused;
      pauseBtn.textContent = isPaused ? "▶" : "⏸";
      isPaused ? stopCarousel() : startCarousel();
    });
  
    showSlide(current);
    startCarousel();
  });
  