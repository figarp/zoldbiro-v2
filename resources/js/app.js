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

// const carouselElement = document.getElementById('default-carousel');

// const options = {
//     defaultPosition: 1,
//     interval: 12000,
// }

// const instanceOptions = {
//     id: 'default-example',
//     override: true
//   };

// const carousel = new Carousel(carouselElement, items, options, instanceOptions);
// carousel.cycle();

