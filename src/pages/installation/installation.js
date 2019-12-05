import { swiperInit } from 'common/functions.js';

export function installation() {
  $(document).ready(() => {
    let installTypesSlider = swiperInit({
      mediaQ: '(min-width: 992px)',
      swiperContainer: '.Installation-Types',
      swiperOptions: {
        grabCursor: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        spaceBetween: 15,
        slidesPerView: 1,
        breakpointsInverse: true,
        breakpoints: {
          576: {
            slidesPerView: 2,
          },
          768: {
            slidesPerView: 3,
          }
        },
      }
    });

    let installStepsSlider = swiperInit({
      mediaQ: '(min-width: 992px)',
      swiperContainer: '.Installation-Steps',
      swiperOptions: {
        grabCursor: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        spaceBetween: 15,
        slidesPerView: 1,
        breakpointsInverse: true,
        breakpoints: {
          576: {
            slidesPerView: 2,
          },
          768: {
            slidesPerView: 3,
          }
        },
      }
    });
  });
};