require('./bootstrap');
require('./swiper-bundle.min.js')

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.Swiper = require('./swiper-bundle.min.js');


var swiper = new Swiper('.slider-principal', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
