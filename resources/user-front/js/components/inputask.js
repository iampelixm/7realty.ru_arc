require('inputmask');

var selector = document.querySelectorAll(".mask");
var inputMask = new Inputmask({ mask: function () { return ["+7 999 999-99-99", "7 999 999-99-99"]; }});
inputMask.mask(selector);