import * as localLib from 'common/functions.js';
export { localLib };

import Inputmask from "inputmask";

$(document).ready(() => {
  $('.needs-validation').submit(function (e) {
    if (e.target.checkValidity() === false) {
      e.preventDefault();
      e.stopPropagation();
    }
    $(e.target).addClass('was-validated');
  });
  let telInputs = $('input[type=tel]');
  telInputs.val('+7');
  Inputmask({
    mask: "(ps|e|)-(999)-999-9999",
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

  let callbackModal = $('#callback').modal({
    show: false
  });
  $('.Callback').click(() => {
    callbackModal.modal('show');
  });
  $('#callbackClose').click(() => {
    callbackModal.modal('hide');
  });
  $('#callback form').submit(function (e) {
    e.preventDefault();
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
        console.log(data);
        callbackModal.modal('hide');
      })
      .fail(() => {
        console.log('Ошибка при получении данных с сервера');
      });
  });


  $('a[href^="#"]').click(function (e) {
    e.preventDefault();
    var id = $(this).attr('href');
    var top = $(id).offset().top;
    $('html, body').animate({
      scrollTop: top
    }, 350);
  });

  new localLib.Cart;
});

import { installation } from 'pages/installation/installation.js';
if (window.location.pathname === '/installation/') {
  installation();
}

import { index } from 'pages/index/index.js';
if (window.location.pathname === '/') {
  index();
}




