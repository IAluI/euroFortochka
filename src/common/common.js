import 'bootstrap';

import faqPage from '../pages/faq/faq';
faqPage();

$(document).ready(() => {
  let callbackModal = $('#callback').modal({
    show: false
  });
  $('.MainHeader-Callback').click(() => {
    callbackModal.modal('show');
  });
  $('#callbackClose, #callbackSubmit').click(() => {
    callbackModal.modal('hide');
  });
});
