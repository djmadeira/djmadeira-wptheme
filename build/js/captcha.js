(function (undefined) {
'use strict';

var captchaInfo = new XMLHttpRequest();
captchaInfo.open(
  "POST",
  window.wp.adminURL
);
captchaInfo.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
captchaInfo.addEventListener('load', setupCommentCaptcha);
captchaInfo.send('action=custom_captcha');

function setupCommentCaptcha (e) {
  var data = JSON.parse(e.target.responseText);
  var questionTextEl = document.getElementById('captcha-label-text');
  var captchaAnswer = document.getElementById('captcha-answer');

  switch(data.operator) {
    case 1:
      var message = "Add " + data.num_one + " and " + data.num_two + ".";
      captchaAnswer.value = data.num_one + data.num_two;
      break;
    case 2:
      var message = "Subtract " + data.num_two + " from " + data.num_one + ".";
      captchaAnswer.value = data.num_one - data.num_two;
      break;
    case 3:
      var message = "Multiply " + data.num_one + " by " + data.num_two + ".";
      captchaAnswer.value = data.num_one * data.num_two;
      break;
  }

  questionTextEl.innerHTML = message;
}

})();