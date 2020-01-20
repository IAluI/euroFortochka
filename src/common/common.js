import * as localLib from 'common/functions.js';
export { localLib };

import Inputmask from "inputmask";

$(document).ready(() => {
  /*$('input[type=tel]').inputmask({
    mask: "+7-(999)-999-9999"
  });*/
  Inputmask({
    mask: "+7-(999)-999-9999"
  }).mask($('input[type=tel]')[0]);

  let callbackModal = $('#callback').modal({
    show: false
  });
  $('.Callback').click(() => {
    callbackModal.modal('show');
  });
  $('#callbackClose, #callbackSubmit').click(() => {
    callbackModal.modal('hide');
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




