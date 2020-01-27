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
/**
 * Создает модельное окно
 * @prop {object} node Узел модального окна
 */
export class Modal {
  /**
   * Инициализирует модельное окно
   * @param {string} selector Селектор контейнера модельного окна
   * @param {string} callers Селектор элементов вызывающих моальное окно
   * */
  constructor(selector, callers) {
    this.node = $(selector).first().modal({
      show: false
    });
    $(callers).click(() => {
      this.node.modal('show');
    });
    this.node.find('.close').click(() => {
      this.node.modal('hide');
    });
  }
}
/**
 * Создает модельное окно корзины
 * @prop {object} goodsTmpl Шаблон товара
 * @prop {object} goodsTmpl Узел списка товаров
 */
export class Cart extends Modal {
  constructor(...args) {
    super(...args);
    this.products = {};
    this.goodsTmpl = this.node.find('.Cart-GoodsListTmpl');
    this.goodsNode = this.node.find('.Cart-GoodsList');
    $(args[1]).click((e) => {
      this.add(e.target.dataset.cart);
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

          let newGoods = document.importNode(this.goodsTmpl[0], true);
          newGoods.querySelector('.Cart-GoodsListTmplImg').src = this.products[product].picture;
          newGoods.querySelector('.Cart-GoodsListTmplName').textContent = this.products[product].name;
          newGoods.querySelector('.Cart-GoodsListTmplCountN').textContent = this.products[product].quantity;
          newGoods.querySelector('.Cart-GoodsListTmplPrice').textContent = this.products[product].price;
          newGoods.querySelector('.Cart-GoodsListTmplSum').textContent = '' + (+this.products[product].quantity * +this.products[product].price);
          newGoods.style.display = 'block';
          newGoods.id = 'cart:' + product;
          this.goodsNode[0].appendChild(newGoods);
        })
        .fail(() => {
          console.log('Ошибка при получении данных с сервера');
        });
    }
    console.log(this.products);
  }
}