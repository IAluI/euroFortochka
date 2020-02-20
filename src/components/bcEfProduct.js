import { swiperInit } from 'common/functions.js';

export function bcEfProduct() {
  $(document).ready(() => {
    let productImagesContainer = $('.Product-MainImages');
    let productImages = new Swiper(productImagesContainer.children('.swiper-container')[0], {
      a11y: {
        enabled: false
      },
      navigation: {
        nextEl: productImagesContainer.children('.swiper-button-next')[0],
        prevEl: productImagesContainer.children('.swiper-button-prev')[0],
      },
      slidesPerView: 1,
    });

    let productOffersContainer = $('.Product-Offers');
    let productOffers = swiperInit({
      mediaQ: '(min-width: 768px)',
      swiperContainer: productOffersContainer.children('.swiper-container')[0],
      swiperOptions: {
        a11y: {
          enabled: false
        },
        navigation: {
          nextEl: productOffersContainer.children('.swiper-button-next')[0],
          prevEl: productOffersContainer.children('.swiper-button-prev')[0],
        },
        slidesPerView: 1,
        breakpointsInverse: true,
        breakpoints: {
          576: {
            slidesPerView: 2,
          }
        },
      }
    });
  });
}