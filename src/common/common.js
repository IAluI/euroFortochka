import * as localLib from 'common/functions.js';
export { localLib };

$(document).ready(() => {
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
});

import { installation } from 'pages/installation/installation.js';
if (window.location.pathname === '/installation/') {
  installation();
}

import { index } from 'pages/index/index.js';
if (window.location.pathname === '/') {
  index();
}




