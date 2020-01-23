export function swiperInit(options) {
  /*
   options = {
   mediaQ: 'string',
   swiperContainer: 'element or selector',
   swiperOptions: 'object'
   };
   */
  let breakpoint = window.matchMedia(options.mediaQ);
  let mySwiper;

  function breakpointChecker() {
    if (breakpoint.matches === true) {
      if (mySwiper !== undefined) {
        mySwiper.destroy(true, true);
      }
      return;
    } else {
      mySwiper = new Swiper(options.swiperContainer, options.swiperOptions);
    }
  }

  breakpoint.addListener(breakpointChecker);
  breakpointChecker();

  return mySwiper;
}

export class Cart {
  constructor() {
    //this.add = this.add.bind(this);
    this.products = {};

    this.cartModal = $('#cart').modal({
      show: false
    });

    $('[data-cart]').click((e) => {
      this.add(e.target.dataset.cart);
      this.cartModal.modal('show');
    });

    $('#cartClose').click(() => {
      this.cartModal.modal('hide');
    });
  }

  add(product) {
    if (this.products[product]) {
      this.products[product].quantity++;
    } else {
      let requestData = product.split(':', 2);
      $.ajax({
        url: '/ajax/item.php',
        method: 'GET',
        dataType: 'json',
        data: {
          type: requestData[0],
          name: requestData[1]
        },
      })
        .done((data) => {
          this.products[product] = data;
          this.products[product].quantity = 1;
        })
        .fail(() => {
          console.log('Ошибка при получении данных с сервера');
        })
    }
    console.log(this.products);
  }
}