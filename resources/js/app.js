require('./bootstrap');
require('./swiper-bundle.min.js')

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

window.Swiper = require('./swiper-bundle.min.js');

window.Elder = require('./elder.js');
new ElderCarousel('.carousel-multiple-items', { items: 3 })

var swiper = new Swiper('.slider-principal', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
