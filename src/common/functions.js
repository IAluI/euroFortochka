import throttle from 'lodash/throttle';

/**
 * Инициализирует слайдер.
 * @prop {object} options - Параметры.
 * @prop {string} mediaQ - Медиа запрос по которому будет производиться инициализация и удаление слайдера.
 * @prop {(object|string)} swiperContainer - Элемент или селектор родительского элемента слайдера.
 * @prop {object} swiperOptions - Параметры слайдера.
 */
export function swiperInit(options) {
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
 * Создает модельное окно.
 * @prop {object} node - Узел модального окна.
 * @prop {number} slide - Текущий номер страницы.
 * @prop {object} slides - JQuery-объект содерщащий все страницы модального окна.
 */
export class Modal {
  /**
   * Инициализирует модельное окно.
   * @param {string} selector - Селектор контейнера модельного окна.
   * @param {string} callers - Селектор элементов вызывающих моальное окно.
   */
  constructor(selector, callers) {
    this.node = $(selector).first().modal({
      show: false
    });

    $(callers).click(() => {
      this.node.modal('show');
    });

    this.slide = 0;
    this.slides = this.node.find('.modal-dialog').children();
    this.slides.addClass('Modal-Slide').hide();
    //$(this.slides[this.slide]).addClass('Modal-Slide_active').show();
    this.slides.eq(this.slide).addClass('Modal-Slide_active').show();
    this.node
      .on('hidden.bs.modal', () => {
        if (this.slide !== 0) {
          this.goToSlide(0);
        }
      });
  }
  /**
   * Совершает переход на заданную страницу модального окна.
   * @param {number} n - Номер страницы.
   */
  goToSlide(n) {
    //let prevSlide = $(this.slides[this.slide]);
    let prevSlide = this.slides.eq(this.slide);
    prevSlide.removeClass('Modal-Slide_active');
    setTimeout(() => {
      prevSlide.hide();
    }, 300);
    //$(this.slides[n]).show().addClass('Modal-Slide_active');
    this.slides.eq(n).show().addClass('Modal-Slide_active');
    this.slide = n;
  }
}
/**
 * Создает модельное окно корзины.
 * @extends Modal
 * @prop {object} goodsTmpl - JQuery-объект содерщащий шаблон товара.
 * @prop {object} goodsNode - JQuery-объект содерщащий узел для размещения товаров.
 * @prop {object} totalNode - JQuery-объект содерщащий элемент используемый для вывода общей стоимости корзины.
 * @prop {object} cartCallNode - JQuery-объект содерщащий узел используемый для открытия модального окна корзины.
 * @prop {object} cartCountNode - JQuery-объект содерщащий элемент используемый для вывода количества типов товаров добавленных в корзину.
 * @prop {object} products - Объект описывающий добавленные в корзину товары.
 * @prop {string} products.name - Наименование товара.
 * @prop {string} products.picture - URL картинки товара.
 * @prop {string} products.price - Цена товара.
 * @prop {number} products.quantity - Количество товара.
 */
export class Cart extends Modal {
  /**
   * Инициализирует модельное окно
   * @param {string} selector - Селектор контейнера модельного окна.
   * @param {string} callers - Селектор элементов вызывающих моальное окно.
   */
  constructor(...args) {
    $(args[1]).click((e) => {
      this.add(e.target.getAttribute('data-cart'));
    });
    args[1] = args[1].trim() + ', .Cart-Call';
    super(...args);

    this.goodsTmpl = this.node.find('.Cart-GoodsListTmpl');
    this.goodsNode = this.node.find('.Cart-GoodsList');
    this.totalNode = this.node.find('.Cart-Total');
    this.cartCallNode = $('.Cart-Call');
    this.cartCountNode = $('.Cart-CallCount');

    this.products = JSON.parse(localStorage.getItem('cart'));
    if (!this.products) {
      this.products = {};
    } else {
      //
      setTimeout(() => {
        this.createGoods(this.products);
      }, 2000);
    }
    this.slides.eq(0).submit(throttle((e) => {
      if (e.target.checkValidity() === false) {
        return;
      }

      let products = {};
      let id;
      for (let key in this.products) {
        id = key.split('-', 2);
        if (!products.hasOwnProperty(id[0])) {
          products[id[0]] = {};
        }
        products[id[0]][id[1]] = this.products[key].quantity;
      }
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
          this.goToSlide(1);
          localStorage.removeItem('cart');
          this.products = {};
          this.refreshCartCount(false);
          this.goodsNode.children().remove();
          e.target.reset();
          $(e.target).removeClass('was-validated').find('[type="tel"]').val('+7 ');
        })
        .fail((data) => {
          this.goToSlide(2);
        })
        .always((data) => {
          console.log(data);
        });
    },
    1000,
    {
      leading: true,
      trailing: false
    }
    ));
  }
  /**
   * Форматирует цену
   * @param {string} number - Цена.
   */
  numberFormat(number) {
    return Number.prototype.toFixed
      .call(parseFloat(number) || 0, 2)
      .replace('.', ',')
      .replace(/(\d)(?=(\d{3})+(?=,))/g, "$1\u00A0")
      .replace(',00', '');
  }
  /**
   * Добавляет новый товар в корзину.
   * @param {string} product - Идентификатор товара.
   */
  add(product) {
    if (this.products[product]) {
      this.changeQuantity(product, true);
    } else {
      let [type, name, mod] = product.split('-', 3);
      console.log(type, name, mod);
      $.ajax({
        url: '/ajax/item.php',
        method: 'GET',
        dataType: 'json',
        data: {
          type,
          name,
          mod,
        },
      })
        .done((data) => {
          console.log(data);
          data.quantity = 1;
          this.products[product] = data;
          localStorage.setItem('cart', JSON.stringify(this.products));
          this.createGoods({
            [product]: data
          });
        })
        .fail((data) => {
          this.goToSlide(2);
          console.log(data);
        });
    }
  }
  /**
   * Изменяет количество товаров в корзине.
   * @param {string} product - Идентификатор товара.
   * @param {boolean} mode - Режим работы. Если true увеличевает, иначе уменьшает.
   */
  changeQuantity(product, mode) {
    let quantity = this.products[product].quantity;
    quantity = mode ? ++quantity: --quantity;
    if (quantity > 0) {
      this.products[product].quantity = quantity;
      localStorage.setItem('cart', JSON.stringify(this.products));
      this.goodsNode
        .find('#cart-' + product + ' .Cart-GoodsListTmplCountN')
        .text(quantity);
      this.goodsNode
        .find('#cart-' + product + ' .Cart-GoodsListTmplSum')
        .text(this.numberFormat(quantity * +this.products[product].price) + '\u00A0Р');
      this.calcTotal();
    }
  }
  /**
   * Удаляет товар из корзины.
   * @param {string} product - Идентификатор товара.
   */
  deleteProduct(product) {
    delete this.products[product];
    localStorage.setItem('cart', JSON.stringify(this.products));
    this.goodsNode.find('#cart-' + product).remove();
    this.calcTotal();
    this.refreshCartCount();
  }
  /**
   * Подсчитывает общую стоимость товров в корзине.
   */
  calcTotal() {
    let sum = 0;
    for (let key in this.products) {
      sum += this.products[key].quantity * +this.products[key].price;
    }
    this.totalNode.text(this.numberFormat(sum));
  }
  /**
   * Обновляет количество типов товаров в корзине.
   * @param {boolean} shouldClose - Следует ли закрывать модальное окно если в корзине отсутсвующт товары.
   */
  refreshCartCount(shouldClose = true) {
    let count = Object.keys(this.products).length;
    if (count === 0) {
      this.cartCallNode.css('display', 'none');
      this.cartCountNode.text('');
      if (shouldClose) {
        this.node.modal('hide');
      }
    } else if (count > 0) {
      this.cartCallNode.css('display', 'block');
      this.cartCountNode.text(count);
    }
  }
  /**
   * Создает элементы товаров.
   * @param {object} products - Объект описывающий добавленные в корзину товары..
   */
  createGoods(products) {
    for (let id in products) {
      let newGoods = document.importNode(this.goodsTmpl[0], true);
      newGoods.querySelector('.Cart-GoodsListTmplImg > img')
        .src = products[id].picture;
      newGoods.querySelector('.Cart-GoodsListTmplName')
        .textContent = products[id].name;
      newGoods.querySelector('.Cart-GoodsListTmplCountPlus')
        .addEventListener('click', (e) => {
          e.preventDefault();
          this.changeQuantity(id, true);
        });
      newGoods.querySelector('.Cart-GoodsListTmplCountN')
        .textContent = products[id].quantity;
      newGoods.querySelector('.Cart-GoodsListTmplCountMinus')
        .addEventListener('click',  (e) => {
          e.preventDefault();
          this.changeQuantity(id, false);
        });
      newGoods.querySelector('.Cart-GoodsListTmplPrice')
        .textContent = this.numberFormat(products[id].price) + '\u00A0Р';
      newGoods.querySelector('.Cart-GoodsListTmplSum')
        .textContent = this.numberFormat(+products[id].quantity * +products[id].price) + '\u00A0Р';
      newGoods.querySelector('.Cart-GoodsListDeleteProduct')
        .addEventListener('click',  (e) => {
          e.preventDefault();
          this.deleteProduct(id);
        });
      newGoods.style.display = "";
      newGoods.id = 'cart-' + id;
      this.goodsNode[0].appendChild(newGoods);
    }
    this.calcTotal();
    this.refreshCartCount();
  }
}