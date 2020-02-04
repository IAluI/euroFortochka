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
  }
}
/**
 * Создает модельное окно корзины
 * @prop {object} goodsTmpl Шаблон товара
 * @prop {object} goodsTmpl Узел списка товаров
 */
export class Cart extends Modal {
  constructor(...args) {
    args[1] = args[1].trim() + ', .Cart-Call';
    super(...args);

    this.products = {};
    this.goodsTmpl = this.node.find('.Cart-GoodsListTmpl');
    this.goodsNode = this.node.find('.Cart-GoodsList');
    this.totalNode = this.node.find('.Cart-Total');
    this.cartCallNode = $('.Cart-Call');
    this.cartCountNode = $('.Cart-CallCount');

    $(args[1]).click((e) => {
      this.add(e.target.dataset.cart);
    });

    this.node
      .on('show.bs.modal', () => {
        this.cartCallNode
          .css('transition', '')
          .css('opacity', 0);
      })
      .on('hide.bs.modal', () => {
        this.cartCallNode
          .css('transition', '1s .3s opacity')
          .css('opacity', 1);
      });

    this.node.find('form').submit((e) => {
      e.preventDefault();

      let products = {};
      let id;
      for (let key in this.products) {
        id = key.split('-', 2);
        if (!products.hasOwnProperty(id[0])) {
          products[id[0]] = {};
        }
        products[id[0]][id[1]] = this.products[key].quantity;
      }
      /*let data = {
        name: e.target.querySelector('[name=name]').value,
        city: e.target.querySelector('[name=city]').value,
        tel: e.target.querySelector('[name=tel]').value,
        products,
      };
      console.log(data);*/
      $.ajax({
        url: '/ajax/order.php',
        method: 'POST',
        dataType: 'json',
        data: {
          name: e.target.querySelector('[name=name]').value,
          city: e.target.querySelector('[name=city]').value,
          tel: e.target.querySelector('[name=tel]').value,
          products,
        },
      })
        .done((data) => {
          console.log(data);
        })
        .fail((data) => {
          console.log('Ошибка при получении данных с сервера', data);
        })
        .always(() => {
          this.node.modal('hide');
        });
    });
  }

  numberFormat(number) {
    return Number.prototype.toFixed
      .call(parseFloat(number) || 0, 2)
      .replace('.', ',')
      .replace(/(\d)(?=(\d{3})+(?=,))/g, "$1\u00A0")
      .replace(',00', '');
  }

  add(product) {
    if (this.products[product]) {
      this.changeQuantity(product, true);
    } else {
      let requestData = product.split('-', 2);
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
          newGoods.querySelector('.Cart-GoodsListTmplImg > img')
            .src = this.products[product].picture;
          newGoods.querySelector('.Cart-GoodsListTmplName')
            .textContent = this.products[product].name;
          newGoods.querySelector('.Cart-GoodsListTmplCountPlus')
            .addEventListener('click', (e) => {
              e.preventDefault();
              this.changeQuantity(product, true);
            });
          newGoods.querySelector('.Cart-GoodsListTmplCountN')
            .textContent = this.products[product].quantity;
          newGoods.querySelector('.Cart-GoodsListTmplCountMinus')
            .addEventListener('click',  (e) => {
              e.preventDefault();
              this.changeQuantity(product, false);
            });
          newGoods.querySelector('.Cart-GoodsListTmplPrice')
            .textContent = this.numberFormat(this.products[product].price) + '\u00A0Р';
          newGoods.querySelector('.Cart-GoodsListTmplSum')
            .textContent = this.numberFormat(+this.products[product].quantity * +this.products[product].price) + '\u00A0Р';
          newGoods.querySelector('.Cart-GoodsListDeleteProduct')
            .addEventListener('click',  (e) => {
              e.preventDefault();
              this.deleteProduct(product);
            });
          newGoods.style.display = "";
          newGoods.id = 'cart-' + product;
          this.goodsNode[0].appendChild(newGoods);
          this.calcTotal();
          this.refreshCartCount();

          console.log(Object.keys(this.products).length);
        })
        .fail(() => {
          console.log('Ошибка при получении данных с сервера');
        });
    }
    console.log(this.products);
  }

  changeQuantity(product, mode) {
    let quantity = this.products[product].quantity;
    quantity = mode ? ++quantity: --quantity;
    if (quantity > 0) {
      this.products[product].quantity = quantity;
      this.goodsNode
        .find('#cart-' + product + ' .Cart-GoodsListTmplCountN')
        .text(quantity);
      this.goodsNode
        .find('#cart-' + product + ' .Cart-GoodsListTmplSum')
        .text(this.numberFormat(quantity * +this.products[product].price) + '\u00A0Р');
      this.calcTotal();
    } /*else {
      delete this.products[product];
      this.goodsNode.find('#cart-' + product).remove();
    }*/
  }
  
  deleteProduct(product) {
    delete this.products[product];
    this.goodsNode.find('#cart-' + product).remove();
    this.calcTotal();
    this.refreshCartCount();
  }

  calcTotal() {
    let sum = 0;
    for (let key in this.products) {
      sum += this.products[key].quantity * +this.products[key].price;
    }
    this.totalNode.text(this.numberFormat(sum));
  }

  refreshCartCount() {
    //console.log('ok');
    let count = Object.keys(this.products).length;
    //console.log(count);
    if (count === 0) {
      this.cartCallNode.css('display', 'none');
      this.cartCountNode.text('');
      this.node.modal('hide');
    } else if (count > 0) {
      this.cartCallNode.css('display', 'block');
      this.cartCountNode.text(count);
    }
  }

}