import { swiperInit } from 'common/functions.js';

export function index() {
  $(document).ready(() => {
    let sliderNav = $('.why-breezer__nav').children();

    let whyBreezerSliderParam = {
      speed: 600,
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      slidesPerView: 1,
      autoHeight: true,
      on: {
        slideChange: function () {
          $(sliderNav[this.activeIndex]).addClass('why-breezer__nav-item--active');
          $(sliderNav[this.previousIndex]).removeClass('why-breezer__nav-item--active');
        }
      }
    };
    let breakpoint = window.matchMedia('(min-width: 992px)');


    whyBreezerSliderParam.autoHeight = !breakpoint.matches;
    let whyBreezerSlider = new Swiper(
      '.why-breezer__compare',
      whyBreezerSliderParam
    );
    sliderNav.each((i, el) => {
      $(el).hover(() => {
        if (whyBreezerSlider.activeIndex !== i) {
          whyBreezerSlider.slideTo(i);
          $('html, body').animate({
            scrollTop: $(whyBreezerSlider.el).offset().top
          }, 350);
        }
      });
    });
    console.log(whyBreezerSlider.$el)

    let sliderReInit = function () {
      whyBreezerSliderParam.autoHeight = !breakpoint.matches;
      whyBreezerSlider.destroy(false, true);
      whyBreezerSlider = new Swiper(
        '.why-breezer__compare',
        whyBreezerSliderParam
      );
    };
    breakpoint.addListener(sliderReInit);


    let DifferenceBreezerSlider = swiperInit({
      mediaQ: '(min-width: 992px)',
      swiperContainer: '.DifferenceBreezer',
      swiperOptions: {
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
          }
        },
      }
    });

    let WhyWeSlider = swiperInit({
      mediaQ: '(min-width: 992px)',
      swiperContainer: '.WhyWe-Reasons',
      swiperOptions: {
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        spaceBetween: 0,
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