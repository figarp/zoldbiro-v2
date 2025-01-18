import './bootstrap';

import Alpine from 'alpinejs';
import { Carousel } from 'flowbite';

window.Alpine = Alpine;

Alpine.start();

const scrollToTopBtn = document.getElementById("scrollToTopBtn");

// Show or hide the button depending on scroll position
window.onscroll = function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollToTopBtn.classList.remove("hidden");
    } else {
        scrollToTopBtn.classList.add("hidden");
    }
};

// Scroll to the top when the button is clicked
scrollToTopBtn.onclick = function() {
    window.scrollTo({ top: 0, behavior: "smooth" });
};

const slides = document.querySelectorAll('#slider > div');
    const buttons = document.querySelectorAll('[data-slide]');
    let currentSlide = 0;

    function showSlide(index) {
      slides[currentSlide].style.opacity = '0';
      currentSlide = index;
      slides[currentSlide].style.opacity = '1';
    }

    function autoSwitchSlides() {
      setInterval(() => {
        const nextSlide = (currentSlide + 1) % slides.length;
        showSlide(nextSlide);
      }, 5000); // 5 seconds interval
    }

    buttons.forEach((button, index) => {
      button.addEventListener('click', () => {
        showSlide(index);
      });
    });

    autoSwitchSlides();