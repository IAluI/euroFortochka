import "core-js/stable/promise";

import throttle from 'lodash/throttle';
import svg4everybody from 'svg4everybody';

import * as localLib from 'common/functions.js';
export { bcEfProduct, bcEfElementList };

import Inputmask from "inputmask";

$(document).ready(() => {
  svg4everybody();
  /*
   Анимирование переходов между якорями внутри страницы
   */
  $('a[href^="#"]').click(function (e) {
    e.preventDefault();
    var id = $(this).attr('href');
    var top = $(id).offset().top;
    $('html, body').animate({
      scrollTop: top
    }, 350);
  });
  /*
  Добавление маски на инпуты номера телефона
   */
  $('.needs-validation').submit(function (e) {
    e.preventDefault();
    if (e.target.checkValidity() === false) {
      e.stopPropagation();
    }
    $(e.target).addClass('was-validated');
  });
  let telInputs = $('input[type=tel]');
  telInputs.val('+7');
  Inputmask({
    mask: "(ps|e|) (999) 999 9999",
    definitions: {
      's': {
        validator: '[7]'
      },
      'e': {
        validator: '[8]'
      },
      'p': {
        validator: '\\+'
      }
    },
    jitMasking: true,
  }).mask(telInputs);
  /*
  Инициализация модального окна формы обратной связи
   */
  let callbackModal = new localLib.Modal('#callback', '.Callback');
  callbackModal.slides.eq(0).submit(throttle(function (e) {
    if (e.target.checkValidity() === false) {
      return;
    }
    
    $.ajax({
      url: '/ajax/callBack.php',
      method: 'POST',
      dataType: 'json',
      data: {
        name: e.target.querySelector('[name=name]').value,
        city: e.target.querySelector('[name=city]').value,
        tel: e.target.querySelector('[name=tel]').value,
        message: e.target.querySelector('[name=message]').value,
      },
    })
      .done((data) => {
        callbackModal.goToSlide(1);
        e.target.reset();
        $(e.target).removeClass('was-validated').find('[type="tel"]').val('+7 ');
      })
      .fail((data) => {
        callbackModal.goToSlide(2);
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
  /*
   Инициализация модального окна корзины
   */
  let cartModal = new localLib.Cart('#cart', '[data-cart]');
});

switch (window.location.pathname) {
  case '/':
  import(/* webpackChunkName: "index" */ 'pages/index/index.js').then(module => {
    module.index();
  }).catch(error => {
    console.log(error);
  });
  break;
  case '/installation/':
  import(/* webpackChunkName: "installation" */ 'pages/installation/installation.js').then(module => {
    module.installation();
  }).catch(error => {
    console.log(error);
  });
  break;
}

function bcEfProduct() {
  import(/* webpackChunkName: "bcEfProduct" */ 'components/bcEfProduct.js').then(module => {
    module.bcEfProduct();
  }).catch(error => {
    console.log(error);
  });
}

function bcEfElementList() {
  import(/* webpackChunkName: "bcEfElementList" */ 'components/bcEfElementList.js').then(module => {
    module.bcEfElementList();
  }).catch(error => {
    console.log(error);
  });
}






