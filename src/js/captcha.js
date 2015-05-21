(function (undefined) {
'use strict';

addEventListener('DOMContentLoaded', function () {
  var questionTextEl = document.getElementById('captcha-label-text');
  var captchaAnswer = document.getElementById('captcha-answer');

  if (!questionTextEl) {
    return;
  }

  var operator = Math.floor(Math.random() * 3);
  var num1 = Math.floor(Math.random() * 5) + 1;
  var num2 = Math.floor(Math.random() * 5) + 1;

  var message = '';

  switch(operator) {
    case 0:
      message = "Add " + num1 + " and " + num2 + ".";
      captchaAnswer.value = num1 + num2;
      break;
    case 1:
      message = "Subtract " + num2 + " from " + num1 + ".";
      captchaAnswer.value = num1 - num2;
      break;
    case 2:
      message = "Multiply " + num1 + " by " + num2 + ".";
      captchaAnswer.value = num1 * num2;
      break;
  }

  questionTextEl.innerHTML = message;
});

})();
