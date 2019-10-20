export default function () {
  $(document).ready(() => {

    const showAnswer = (function () {
      let wrapper = $('.Faq-AnswerWrapper').first();
      return (e) => {
        console.log(wrapper);
        wrapper.height(0);
        wrapper = $(e.currentTarget).siblings('.Faq-AnswerWrapper');
        wrapper.height(wrapper.children('.Faq-Answer').outerHeight());
      }
    })();

    $('.Faq-Question').click(showAnswer);

  })
}