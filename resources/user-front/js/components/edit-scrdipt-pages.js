
function hideAllEl(){
  var resFormHide = document.getElementsByClassName('content-residential-form-down');
  resFormHide[0].classList.remove('active');
  resFormHide[1].classList.remove('active');
  resFormHide[2].classList.remove('active');
  if(resFormHide[3]){
    resFormHide[3].classList.remove('active');
  }
}
let parentElement = document.querySelector('.filter-wrapper-class');

if(parentElement != null){
  document.addEventListener("click", (e) => {
    let target = e.target;
    var resFormHide = document.getElementsByClassName('content-residential-form-down');
    if (!parentElement.contains(target)) {
      resFormHide[0].classList.remove('active');
      resFormHide[1].classList.remove('active');
      resFormHide[2].classList.remove('active');
      if(resFormHide[3]){
        resFormHide[3].classList.remove('active');
      }
    }
  }, false);
}
let arrowFilters = document.getElementsByClassName('b-arrow');
if(arrowFilters.length) {
  arrowFilters[0].addEventListener( "click" , function(){hideAllEl()}, false); // цена
  arrowFilters[1].addEventListener( "click" , function(){hideAllEl()}, false); // комнаты
  if(arrowFilters[2]){
    arrowFilters[2].addEventListener( "click" , function(){hideAllEl()}, false); // площадь
  }
}
//   arrowFilter.addEventListener('click', function(){
//     console.log(1);
//     hideAllEl}, false)
// }

var resForm = document.getElementsByClassName('content-residential-form-input'); // div формы с параметрами
if(resForm.length) {
  resForm[0].children[0].children[0].addEventListener( "click" , function(){showElprice(this)}, false); // цена
  // resForm[1].addEventListener( "click" , function(){showEllocation(this)}, false); // район
  resForm[1].children[0].children[0].addEventListener( "click" , function(){showElrooms(this)}, false); // комнаты
  if(resForm[2]){
    resForm[2].children[0].children[0].addEventListener( "click" , function(){showElsquare(this)}, false); // площадь
  }
}

// function showEllocation(el) {
//   hideAllEl();
//   el.parentNode.parentNode.parentNode.nextElementSibling.children[0].classList.add('active');
//   console.log()
// }
function showElprice(el) {
  hideAllEl();
  el.parentNode.parentNode.parentNode.nextElementSibling.children[0].classList.add('active');
}
function showElrooms(el) {
  hideAllEl();
  el.parentNode.parentNode.parentNode.nextElementSibling.children[2].classList.add('active');
}
function showElsquare(el) {
  hideAllEl();
  el.parentNode.parentNode.parentNode.nextElementSibling.children[3].classList.add('active');
}
  // форма подбора квартир мобильная
  // function showNextEl(el){
  //   for(var i = 1; i <= 8; i++) {
  //     if(el == el.parentNode.children[i]) {
  //       i++;
  //       if(el.parentNode.children[i].classList.contains('d-none')) {
  //         el.parentNode.children[i].classList.remove('d-none');
  //       } else {
  //         el.parentNode.children[i].classList.add('d-none');
  //       }
  //     } else {
  //       i++;
  //       if(el.parentNode.children[i].classList.contains('d-none')) {
  //       } else {
  //         el.parentNode.children[i].classList.add('d-none');
  //       }
  //     }
  //   }
  // }
  
  