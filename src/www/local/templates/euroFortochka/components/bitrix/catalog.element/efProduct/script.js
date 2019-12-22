$(document).ready(function() {
  var productImages = new Swiper('.Product-MainImages', {
    a11y: {
      enabled: false
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    slidesPerView: 1,
    spaceBetween: 50,
    touchEventsTarget: 'wrapper',
  });

  var productOffers = new Swiper('.Product-Offers', {
    a11y: {
      enabled: false
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    slidesPerView: 1,
    spaceBetween: 50,
    touchEventsTarget: 'wrapper',
  });
});