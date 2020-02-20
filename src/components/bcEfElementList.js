export function bcEfElementList() {
  $(document).ready(() => {
    const showAnswer = (function () {
      let question = $('.Faq-Question').first();
      let answer = question.siblings('.Faq-AnswerWrapper');
      return (e) => {
        let newQuestion = $(e.currentTarget);

        if (question[0] !== newQuestion[0]) {
          answer.height(0);
          question.removeClass('Faq-Question_isActive');
          question = newQuestion;
          answer = question.siblings('.Faq-AnswerWrapper');
        }

        if (question.hasClass('Faq-Question_isActive')) {
          answer.height(0);
          question.removeClass('Faq-Question_isActive');
          return;
        } else {
          answer.height(
            answer.children('.Faq-Answer').outerHeight()
          );
          question.addClass('Faq-Question_isActive');
        }
      };
    }());

    $('.Faq-Question').click(showAnswer);
  });
}