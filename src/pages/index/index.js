import { swiperInit } from 'common/functions.js';

export function index() {
  $(document).ready(() => {
    let sliderNav = $('.WhyBreezer-Nav').children();
    //console.log(sliderNav);
    //console.log(sliderNav[0]);

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
          $(sliderNav[this.activeIndex]).addClass('isActive');
          $(sliderNav[this.previousIndex]).removeClass('isActive');
          //console.log(this.activeIndex);
          //previousIndex
        }
      }
    };
    let breakpoint = window.matchMedia('(min-width: 992px)');


    whyBreezerSliderParam.autoHeight = !breakpoint.matches;
    let whyBreezerSlider = new Swiper(
      '.WhyBreezer-Compare',
      whyBreezerSliderParam
    );
    sliderNav.each((i, el) => {
      $(el).click(() => {
        whyBreezerSlider.slideTo(i);
        $('html, body').animate({
          scrollTop: $('.WhyBreezer-Compare:first').offset().top
        }, 350);
      });
    });

    let sliderReInit = function () {
      whyBreezerSliderParam.autoHeight = !breakpoint.matches;
      whyBreezerSlider.destroy(false, true);
      whyBreezerSlider = new Swiper(
        '.WhyBreezer-Compare',
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