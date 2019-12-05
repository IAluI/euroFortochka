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
});

import { installation } from 'pages/installation/installation.js';

if (window.location.pathname === '/installation/') {
  installation();
}



