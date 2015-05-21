(function (undefined) {
'use strict';

// For animating skill items
var skillsBackground = function () {
  var elList = document.getElementsByClassName('skill-breakdown-part');
  var i, el, value, w, child;
  for (i=0; i < elList.length; i++) {
    el = elList[i];
    value = el.getAttribute('data-value');
    w = el.width;
    child = document.createElement('div');
    child.classList.add('skill-part-fill');
    el.appendChild(child);
    window.setTimeout(function (child, value) {
      child.style.transform = 'scaleX('+value+')';
      child.style.webkitTransform = 'scaleX('+value+')';
    }, 1, child, value);
  }
}

window.addEventListener('load', function () {
  skillsBackground();
});

}());
