export function swiperInit(options) {
  /*
   options = {
   mediaQ: 'string',
   swiperContainer: 'element or selector',
   swiperOptions: 'object'
   };
   */
  var breakpoint = window.matchMedia(options.mediaQ);
  var mySwiper;
  function breakpointChecker() {
    if (breakpoint.matches === true) {
      if (mySwiper !== undefined) {
        mySwiper.destroy(true, true);
      }
      return;
    } else if (breakpoint.matches === false) {
      return enableSwiper();
    }
  }
  function enableSwiper() {
    mySwiper = new Swiper(options.swiperContainer, options.swiperOptions);
  }

  breakpoint.addListener(breakpointChecker);
  breakpointChecker();

  return mySwiper;
}