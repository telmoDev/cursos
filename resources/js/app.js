require('./bootstrap');
// require('./swiper-bundle.min.js')

import Swiper from 'swiper';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

window.Swiper = require('./swiper-bundle.min.js');

window.Elder = require('./elder.js');
new ElderCarousel('.carousel-multiple-items', { items: 3 })
// new ElderCarousel('.carousel-principal-items', { items: 1, itemWidth:100 })

var swiper = new Swiper('.slider-principal', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  var swiper = new Swiper('.carousel-principal-items');
