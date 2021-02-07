// мобильное меню
// выбор города
// function showMobileMenu(obj){
// 	console.log(4);
// 	if(obj.parentNode.parentNode.children[obj.parentNode.parentNode.children.length-1].classList.contains('d-none')) {
// 		obj.parentNode.parentNode.children[obj.parentNode.parentNode.children.length-1].classList.remove('d-none');
// 	} else {
// 		obj.parentNode.parentNode.children[obj.parentNode.parentNode.children.length-1].classList.add('d-none');
// 	}
// }
// function chooseCity(obj){
// 	for (var i = 0; i < obj.parentNode.parentNode.parentNode.children.length; i++) {
// 		if(obj.count == i) {
// 			obj.parentNode.parentNode.parentNode.children[i].classList.remove('d-none');
// 			obj.parentNode.parentNode.parentNode.children[i].classList.add('d-block');
// 		} else {
// 			obj.parentNode.parentNode.parentNode.children[i].classList.remove('d-block');
// 			obj.parentNode.parentNode.parentNode.children[i].classList.add('d-none');
// 		}
// 	}
// }
// var mobileMenuCity = document.getElementsByClassName('mobile-up-menu-adress'); // Ссылка с выбором города Москва/Сочи
// for (var i = 0; i < mobileMenuCity.length; i++) {
// 	mobileMenuCity[i].addEventListener( "click" , function(){showMobileMenu(this)}, false);
// }
// var mobileMenuChooseCity = document.getElementsByClassName('mobile-d-menu-adress'); // Ссылка с выбором города Москва/Сочи
// for (var i = 0; i < mobileMenuChooseCity.length; i++) {
// 	mobileMenuChooseCity[i].count = i;
// 	mobileMenuChooseCity[i].addEventListener( "click" , function(){chooseCity(this)}, false);
// }
// // выбор квартиры
// var mobileMenuRoom = document.getElementsByClassName('mobile-up-menu-rooms'); // Ссылка с квартиры
// for (var i = 0; i < mobileMenuRoom.length; i++) {
// 	mobileMenuRoom[i].addEventListener( "click" , function(){showMobileMenu(this)}, false);
// }
// // Жилые комплексы
// var mobileMenuRes = document.getElementsByClassName('mobile-up-menu-residentials'); // Ссылка с выбором жилого комплекса
// for (var i = 0; i < mobileMenuRes.length; i++) {
// 	mobileMenuRes[i].addEventListener( "click" , function(){showMobileMenu(this)}, false);
// }
// // Дома
// var mobileMenuHouse = document.getElementsByClassName('mobile-up-menu-houses'); // Ссылка с выбором дома
// for (var i = 0; i < mobileMenuHouse.length; i++) {
// 	mobileMenuHouse[i].addEventListener( "click" , function(){showMobileMenu(this)}, false);
// }
// // земля
// var mobileMenuLand = document.getElementsByClassName('mobile-up-menu-lands'); // Ссылка с земли
// for (var i = 0; i < mobileMenuLand.length; i++) {
// 	mobileMenuLand[i].addEventListener( "click" , function(){showMobileMenu(this)}, false);
// }
// // недвижимость
// var mobileMenuEstate = document.getElementsByClassName('mobile-up-menu-estates'); // Ссылка с недвижимости
// for (var i = 0; i < mobileMenuEstate.length; i++) {
// 	mobileMenuEstate[i].addEventListener( "click" , function(){showMobileMenu(this)}, false);
// }

const { forEach } = require("lodash");

// изменение картинок
function changeOpacity(obj1, obj2, opacityValue) {
	if(opacityValue > 0) {
		obj2op = 1 - opacityValue;
		obj1.style.cssText = `opacity: ${opacityValue};
		z-index: 1;`;
		obj2.style.cssText = `opacity: ${obj2op};
		z-index: 0;`;
		opacityValue = opacityValue - 0.1;
		setTimeout(changeOpacity, 20, obj1, obj2, opacityValue);
	} else {
		obj1.style.cssText = `opacity: 1;`;
		obj1.classList.remove('d-block');
		obj1.classList.add('d-none')
	}
}
// Анимация большой картинки
function changeBigToLeft(numberThis){
	for (var i = 4; i<numberThis.parentNode.children.length-1; i++) {
		var opacityValue = 1;
		if(numberThis.parentNode.children[i].classList.contains('d-block')) {
			if(i == 4){
				var thisEl = numberThis.parentNode.children[i];
				var nextEl = numberThis.parentNode.children[numberThis.parentNode.children.length-2];
				nextEl.classList.remove('d-none');
				nextEl.classList.add('d-block');
				changeOpacity(thisEl, nextEl, opacityValue);
				return;
			} else {
				var thisEl = numberThis.parentNode.children[i];
				var nextEl = numberThis.parentNode.children[i-1];
				nextEl.classList.remove('d-none');
				nextEl.classList.add('d-block');
				changeOpacity(thisEl, nextEl, opacityValue);
				return;
			}
		}
	}
}
function changeBigToRight(numberThis){
	for (var i = 4; i<numberThis.parentNode.children.length-1; i++) {
		var opacityValue = 1;
		if(numberThis.parentNode.children[i].classList.contains('d-block')) {
			if(i == numberThis.parentNode.children.length-2){
				var thisEl = numberThis.parentNode.children[i];
				var nextEl = numberThis.parentNode.children[4];
				nextEl.classList.remove('d-none');
				nextEl.classList.add('d-block');
				changeOpacity(thisEl, nextEl, opacityValue);
				return;
			} else {
				var thisEl = numberThis.parentNode.children[i];
				var nextEl = numberThis.parentNode.children[i+1];
				nextEl.classList.remove('d-none');
				nextEl.classList.add('d-block');
				changeOpacity(thisEl, nextEl, opacityValue);
				return;
			}
		}
	}
}
function changeUrlLeft(numberThis){
	for (var i = numberThis.parentNode.children.length - 3; i > 0; i--) {
		if(numberThis.parentNode.children[i].classList.contains('d-block')) {
			if(i == 1){
				var opacityValue = 1;
				//numberThis.parentNode.children[i].classList.remove('d-block');
				//numberThis.parentNode.children[i].classList.add('d-none');
				numberThis.parentNode.children[numberThis.parentNode.children.length - 3].classList.remove('d-none');
				numberThis.parentNode.children[numberThis.parentNode.children.length - 3].classList.add('d-block');
				changeOpacity(numberThis.parentNode.children[i], numberThis.parentNode.children[numberThis.parentNode.children.length - 3], opacityValue);
				var pagDiv = numberThis.parentNode.children[numberThis.parentNode.children.length - 1]; // div c панигацией
				for(j = 0; j < pagDiv.children.length; j++) {
					if(pagDiv.children[j].classList.contains('slide-image-div-navi__div-active')){
					pagDiv.children[j].classList.remove('slide-image-div-navi__div-active');
					pagDiv.children[j].classList.add('slide-image-div-navi__div-not-active');
					}
				}
				var pagDivN = pagDiv.children.length - 1;
				pagDiv.children[pagDivN].classList.remove('slide-image-div-navi__div-not-active');
				pagDiv.children[pagDivN].classList.add('slide-image-div-navi__div-active');
				return;
			} else {
				var nextEl = i-1;
				var opacityValue = 1;
				numberThis.parentNode.children[nextEl].classList.remove('d-none');
				numberThis.parentNode.children[nextEl].classList.add('d-block');
				changeOpacity(numberThis.parentNode.children[i], numberThis.parentNode.children[nextEl], opacityValue);
				var pagDiv = numberThis.parentNode.children[numberThis.parentNode.children.length - 1]; // div c панигацией
				for(j = 0; j < pagDiv.children.length; j++) {
					if(pagDiv.children[j].classList.contains('slide-image-div-navi__div-active')){
					pagDiv.children[j].classList.remove('slide-image-div-navi__div-active');
					pagDiv.children[j].classList.add('slide-image-div-navi__div-not-active');
					}
				}
				var pagDivN = i - 2;
				pagDiv.children[pagDivN].classList.remove('slide-image-div-navi__div-not-active');
				pagDiv.children[pagDivN].classList.add('slide-image-div-navi__div-active');
				return;
			}
		}
	}
}
function changeUrlRight(numberThis){
		for (var i = 1; i <= numberThis.parentNode.children.length - 3; i++) {
		if(numberThis.parentNode.children[i].classList.contains('d-block')) {
			if(i == numberThis.parentNode.children.length - 3){
				var opacityValue = 1;
				//numberThis.parentNode.children[i].classList.remove('d-block');
				//numberThis.parentNode.children[i].classList.add('d-none');
				numberThis.parentNode.children[1].classList.remove('d-none');
				numberThis.parentNode.children[1].classList.add('d-block');
				changeOpacity(numberThis.parentNode.children[i], numberThis.parentNode.children[1], opacityValue);
				var pagDiv = numberThis.parentNode.children[numberThis.parentNode.children.length - 1]; // div c панигацией
				for(j = 0; j < pagDiv.children.length; j++) {
					if(pagDiv.children[j].classList.contains('slide-image-div-navi__div-active')){
					pagDiv.children[j].classList.remove('slide-image-div-navi__div-active');
					pagDiv.children[j].classList.add('slide-image-div-navi__div-not-active');
					}
				}
				var pagDivN = 0;
				pagDiv.children[pagDivN].classList.remove('slide-image-div-navi__div-not-active');
				pagDiv.children[pagDivN].classList.add('slide-image-div-navi__div-active');
				return;
			} else {
				var nextEl = i+1;
				var opacityValue = 1;
				//numberThis.parentNode.children[i].classList.remove('d-block');
				//numberThis.parentNode.children[i].classList.add('d-none');
				numberThis.parentNode.children[nextEl].classList.remove('d-none');
				numberThis.parentNode.children[nextEl].classList.add('d-block');
				changeOpacity(numberThis.parentNode.children[i], numberThis.parentNode.children[nextEl], opacityValue);
				var pagDiv = numberThis.parentNode.children[numberThis.parentNode.children.length - 1]; // div c панигацией
				for(j = 0; j < pagDiv.children.length; j++) {
					if(pagDiv.children[j].classList.contains('slide-image-div-navi__div-active')){
					pagDiv.children[j].classList.remove('slide-image-div-navi__div-active');
					pagDiv.children[j].classList.add('slide-image-div-navi__div-not-active');
					}
				}
				var pagDivN = i;
				pagDiv.children[pagDivN].classList.remove('slide-image-div-navi__div-not-active');
				pagDiv.children[pagDivN].classList.add('slide-image-div-navi__div-active');
				return;
			}
		}
	}
}
function changeUrlByNumber(numberThis){
	for (var i = 1; i <= numberThis.parentNode.parentNode.children.length - 3; i++) {
		if(numberThis.parentNode.parentNode.children[i].classList.contains('d-block')){
			numberThis.parentNode.parentNode.children[i].classList.remove('d-block');
			numberThis.parentNode.parentNode.children[i].classList.add('d-none');
		}
	}
	var elNumber = numberThis.countj+1;
	numberThis.parentNode.parentNode.children[elNumber].classList.remove('d-none');
	numberThis.parentNode.parentNode.children[elNumber].classList.add('d-block');
	for (var i = 0; i <= numberThis.parentNode.children.length - 1; i++){
		numberThis.parentNode.children[i].classList.remove('slide-image-div-navi__div-active');
		numberThis.parentNode.children[i].classList.add('slide-image-div-navi__div-not-active');
		if(i == numberThis.countj){
			numberThis.parentNode.children[i].classList.remove('slide-image-div-navi__div-not-active');
			numberThis.parentNode.children[i].classList.add('slide-image-div-navi__div-active');
		}
	}
}
function changeHeart(numberThis){
	if(numberThis.children[0].classList.contains('far')) {
		numberThis.children[0].classList.remove('far');
		numberThis.children[0].classList.add('fas');
	} else {
		numberThis.children[0].classList.remove('fas');
		numberThis.children[0].classList.add('far');
	}
}
function smallToBig(el){
	var bigImage = el.parentNode.parentNode.children[0];
	for (var i = 4; i < bigImage.children.length-1; i++) {
		if(bigImage.children[i].classList.contains('d-block')) {
			bigImage.children[i].children[0].src = el.children[0].src;
		}
	}
}
function smallToBigPop(el){
	var bigImage = el.parentNode.parentNode.previousElementSibling.previousElementSibling.children[0];
	for (var i = 4; i < bigImage.children.length-1; i++) {
		if(bigImage.children[i].classList.contains('d-block')) {
			bigImage.children[i].children[0].src = el.src;
		}
	}
}
function smallToBigPopMini(el){
	var bigImage = el.parentNode.parentNode.previousElementSibling;
	for (var i = 4; i < bigImage.children.length-1; i++) {
		if(bigImage.children[i].classList.contains('d-block')) {
			bigImage.children[i].children[0].src = el.src;
		}
	}
}
// большое фото
var bigHearts = document.getElementsByClassName('big-slide-image-div__h4'); // div с сердцем большое фото
if(bigHearts.length){
	bigHearts[0].addEventListener( "click" , function(){changeHeart(this)}, false);
}
// var bigleftButton = document.getElementsByClassName('big-slide-image-div-left'); // div со стрелкой влево большое фото
// bigleftButton[0].addEventListener( "click" , function(){changeBigToLeft(this)}, false);
// bigleftButton[1].addEventListener( "click" , function(){changeBigToLeft(this)}, false);
// var bigRightButton = document.getElementsByClassName('big-slide-image-div-right'); // div со стрелкой вправо большое фото
// bigRightButton[0].addEventListener( "click" , function(){changeBigToRight(this)}, false);
// bigRightButton[1].addEventListener( "click" , function(){changeBigToRight(this)}, false);
var bigPreview = document.getElementsByClassName('big-slide-sm-image'); // дополнительные фотографии под большим
for (var i = 0; i < bigPreview.length; i++) {
	bigPreview[i].addEventListener( "click" , function(){smallToBig(this)}, false);
}
var bigPreview1 = document.getElementsByClassName('full-screen-image'); // дополнительные фотографии под большим В  БОЛЬШОМ Модальном окне
for (var i = 0; i < bigPreview1.length; i++) {
	bigPreview1[i].addEventListener( "click" , function(){smallToBigPop(this)}, false);
}
var bigPreview2 = document.getElementsByClassName('pop-big-image'); // дополнительные фотографии под большим В МАЛЕНЬКОМ Модальном окне
for (var i = 0; i < bigPreview2.length; i++) {
	bigPreview2[i].addEventListener( "click" , function(){smallToBigPopMini(this)}, false);
}
// показать все характеристики
function showAllParam(el){
	el.classList.add('d-none');
	el.previousElementSibling.classList.add('d-none');
	el.nextElementSibling.classList.remove('d-none');
}
var moreParam = document.getElementsByClassName('content-object-card-parametr-list_more'); // div с подписью далее
if(moreParam.length) {
	moreParam[0].addEventListener( "click" , function(){showAllParam(this)}, false);
}
// слайдер отзывов
function fbSlideToLeft(el){
	var parent = el.parentNode.children[1];
	//первый блок - пропадает
	parent.children[0].classList.add('d-none');
	//второй блок - становится первым
	parent.children[1].classList.remove('d-none');
	parent.children[1].classList.remove('d-sm-block');
	// третий блок - становится вторым
	parent.children[2].classList.add('d-sm-block');
	parent.children[2].classList.remove('d-md-block');
	// Четвертый - становится третим
	parent.children[3].classList.add('d-md-block');
	parent.children[3].classList.remove('d-lg-block');
	// Пятый - становится четвертым
	parent.children[4].classList.add('d-lg-block');
	parent.append(parent.children[0]);
}
function fbSlideToRight(el){
	var parent = el.parentNode.children[1];
	// первый блок - становится вторым
	parent.children[0].classList.add('d-none');
	parent.children[0].classList.add('d-sm-block');
	// второй блок - становится третим
	parent.children[1].classList.remove('d-sm-block');
	parent.children[1].classList.add('d-md-block');
	// третий блок становится четвертым
	parent.children[2].classList.remove('d-md-block');
	parent.children[2].classList.add('d-lg-block');
	// четвертый блок пропадает
	parent.children[3].classList.add('d-none');
	parent.children[3].classList.remove('d-lg-block');
	// последний блок - становится первым
	var lastCh = parent.children[parent.children.length-1];
	parent.children[parent.children.length-1].classList.remove('d-none');
	parent.children[parent.children.length-1].classList.remove('d-lg-block');
	parent.prepend(lastCh);
}
var fbSliderLeftButton = document.getElementsByClassName('content-object-card-feedback-slider-left-arrow'); // div со стрелкой влево
if(fbSliderLeftButton.length) {
	fbSliderLeftButton[0].addEventListener( "click" , function(){fbSlideToLeft(this)}, false);
}
var fbSliderRightButton = document.getElementsByClassName('content-object-card-feedback-slider-right-arrow'); // div со стрелкой вправо
if(fbSliderRightButton.length) {
	fbSliderRightButton[0].addEventListener( "click" , function(){fbSlideToRight(this)}, false);
}
function viewAllPartners(numberThis){
	var parent = numberThis.parentNode.parentNode;
	numberThis.classList.add('d-none');
	for (var i = 0; i < parent.children.length; i++) {
		if(i==0) {
			parent.children[i].classList.add('d-none');
			continue;
		}
		if(parent.children[i].classList.contains('d-none')) {
			parent.children[i].classList.remove('d-none');
		}
	}
}
// var slider = document.getElementsByClassName('slide-image-div'); // div с изображением
// var sliderLeftButton = document.getElementsByClassName('slide-image-div-left'); // div со стрелкой влево
// var sliderRightButton = document.getElementsByClassName('slide-image-div-right'); // div со стрелкой вправо
// var navigationBar = document.getElementsByClassName('slide-image-div-navi'); // div с пагинацией
var hearts = document.querySelectorAll('.content-specials-heart'); // div с сердцем
if(hearts.length){
	hearts.forEach(function(hearts){
		hearts.addEventListener('click' , function(){changeHeart(hearts)}, false);
	})
}
var allPartners = document.getElementsByClassName('content-partners-all__button'); // кнопка - показать всех партнеров
if(allPartners.length) {
	allPartners[0].addEventListener( "click" , function(event){
		event.preventDefault();
		viewAllPartners(this)},
	false);
}
// if(navigationBar.length) {
// 	for (var i = 0; i < navigationBar.length; i++) {
// 		for (var j = 0; j < navigationBar[i].children.length; j++) {
// 			navigationBar[i].children[j].counti = i;
// 			navigationBar[i].children[j].countj = j;
// 			navigationBar[i].children[j].addEventListener( "click" , function(){changeUrlByNumber(this)}, false);
// 		}
// 	}
// }
// if(slider.length) {
// 	for (var i = 0; i < slider.length; i++) {
// 		slider[i].count = i;
// 		//slider[i].addEventListener( "click" , () => console.log(this));
// 		sliderLeftButton[i].count = i;
// 		sliderLeftButton[i].addEventListener( "click" , function(){changeUrlLeft(this)}, false);
// 		sliderRightButton[i].count = i;
// 		sliderRightButton[i].addEventListener( "click" , function(){changeUrlRight(this)}, false);
// 		if(hearts.length) {
// 			hearts[i].addEventListener( "click" , function(){changeHeart(this)}, false);
// 		}
// 	}
// }
//активность слайдера
// function elMoveToLeft(numberThis){
// 	var opacityValue = 0.9;
// 	var transformValue = 3;
// 	setTimeout(elHideLeft, 15, numberThis, opacityValue, transformValue);
// }
// function elHideLeft(obj, opacityValue, transformValue){
// 		if(opacityValue > 0) {
// 			obj.style.cssText = `max-width: 350px;
// 			min-width: 28%;
// 			background: #FFFFFF;
// 			box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.09);
// 			border-radius: 8px;
// 			margin: 0 auto;
// 			padding: 0 0 10px 0;
// 			opacity: ${opacityValue};
// 			transform: translateX(-${transformValue}px);`;
// 			opacityValue = opacityValue - 0.1;
// 			transformValue = transformValue + 3;
// 			setTimeout(elHideLeft, 15, obj, opacityValue, transformValue);
// 		} else {
// 			obj.style.cssText = `max-width: 350px;
// 				min-width: 28%;
// 				background: #FFFFFF;
// 				box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.09);
// 				border-radius: 8px;
// 				margin: 0 auto;
// 				padding: 0 0 10px 0;
// 				opacity: 1;
// 				transform: translateX(0);`;
// 			moveSliderToLeft(obj.parentNode.parentNode);
// 		}
// }
// function moveSliderToLeft(numberThis){
// 	var parent = numberThis.parentNode.children[1];
// 	// первый блок - пропадает
// 	parent.children[0].classList.add('d-none');
// 	// второй блок - становится первым
// 	parent.children[1].classList.remove('d-none');
// 	parent.children[1].classList.remove('d-sm-block');
// 	// третий блок - становится вторым
// 	parent.children[2].classList.add('d-sm-block');
// 	parent.children[2].classList.remove('d-lg-block');
// 	// Четвертый - становится третим
// 	parent.children[3].classList.add('d-lg-block');
// 	parent.children[3].classList.remove('d-xl-block');
// 	// Пятый - становится четвертым
// 	parent.children[4].classList.add('d-xl-block');
// 	var firstCh = numberThis.parentNode.children[1].children[0];
// 	parent.append(firstCh);
// }
// function elMoveToRight(numberThis){
// 	var opacityValue = 0.9;
// 	var transformValue = 3;
// 	if(window.innerHeight > window.innerWidth){
//     	var maxElWidth = window.innerWidth;
// 	} else {
// 		var maxElWidth = window.innerWidth;
// 	}
// 	if(maxElWidth <= 575) {
// 		// один блок - разрешение до 575
// 		setTimeout(elHideRight, 15, numberThis.children[0].children[0], opacityValue, transformValue);
// 	} else if(maxElWidth > 575 && maxElWidth <= 991) {
// 		// два блока - разрешение от 576 до 991
// 		setTimeout(elHideRight, 15, numberThis.children[1].children[0], opacityValue, transformValue);
// 	} else if(maxElWidth > 991 && maxElWidth <= 1199) {
// 		// три блока - разрешение 992 и больше
// 		setTimeout(elHideRight, 15, numberThis.children[2].children[0], opacityValue, transformValue);
// 	} else if(maxElWidth > 1199 ) {
// 		// четыре блока - разрешение 992 и больше
// 		setTimeout(elHideRight, 15, numberThis.children[3].children[0], opacityValue, transformValue);
// 	}
// }
// function elHideRight(obj, opacityValue, transformValue){
// 		if(opacityValue > 0) {
// 		obj.style.cssText = `max-width: 350px;
// 		min-width: 28%;
// 		background: #FFFFFF;
// 		box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.09);
// 		border-radius: 8px;
// 		margin: 0 auto;
// 		padding: 0 0 10px 0;
// 		opacity: ${opacityValue};
// 		transform: translateX(${transformValue}px);`;
// 		opacityValue = opacityValue - 0.1;
// 		transformValue = transformValue + 3;
// 		setTimeout(elHideRight, 15, obj, opacityValue, transformValue);
// 	} else {
// 		obj.style.cssText = `max-width: 350px;
// 		min-width: 28%;
// 		background: #FFFFFF;
// 		box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.09);
// 		border-radius: 8px;
// 		margin: 0 auto;
// 		padding: 0 0 10px 0;
// 		opacity: 1;
// 		transform: translateX(0);`;
// 		moveSliderToRight(obj.parentNode.parentNode);
// 	}
// }
// function moveSliderToRight(numberThis){
// 	var parent = numberThis.parentNode.children[1];
// 	// первый блок - становится вторым
// 	parent.children[0].classList.add('d-none');
// 	parent.children[0].classList.add('d-sm-block');
// 	// второй блок - становится третим
// 	parent.children[1].classList.remove('d-sm-block');
// 	parent.children[1].classList.add('d-lg-block');
// 	// третий блок становится четвертым
// 	parent.children[2].classList.remove('d-lg-block');
// 	parent.children[2].classList.add('d-xl-block');
// 	// четвертый блок пропадает
// 	parent.children[3].classList.add('d-none');
// 	parent.children[3].classList.remove('d-xl-block');
// 	// последний блок - становится первым
// 	var lastCh = parent.children[parent.children.length-1];
// 	parent.children[parent.children.length-1].classList.remove('d-none');
// 	parent.children[parent.children.length-1].classList.remove('d-xl-block');
// 	parent.prepend(lastCh);
// }
// var sliderNumber = document.getElementsByClassName('content-specials-list-slider'); // div со слайдером 
// for(var i = 0; i < sliderNumber.length; i++){
// 	sliderNumber[i].children[0].addEventListener( "click" , function(){elMoveToLeft(this.parentNode.children[1].children[0].children[0])}, false); // левая стрелка
// 	sliderNumber[i].children[2].addEventListener( "click" , function(){elMoveToRight(this.parentNode.children[1])}, false); // правая стрелка стрелка
// }
// показать / спрятать мобильно меню 
// function showMMenu(){
// 	console.log(3);
// 	var mobileMenu = document.getElementsByClassName('main-header-mobile-content-active'); // класс мобильного меню
// 	if(mobileMenu[0].classList.contains('d-none')){
// 		mobileMenu[0].classList.remove('d-none');
// 	} else {
// 		mobileMenu[0].classList.add('d-none');
// 	}
// }
// var buttonLogin1 = document.getElementsByClassName('main-header-mobile__3gram'); // Иконка 3грамм в мобильной шапке
// buttonLogin1[0].children[0].addEventListener( "click" , function(){showMMenu()}, false);
// активность поп-апов
// всплывает при нажатии на кнопу в меню
// Купить - продать
function showSellPop(numberThis){
	console.log(1);
	var sellPop = document.getElementsByClassName('pop-full-screen-by-sell');
	sellPop[0].classList.remove('d-none');
	sellPop[0].classList.add('d-block');
	sellPop[0].style.height = document.documentElement.scrollHeight+'px';
}
function hideSellPop(numberThis){
	var sellPop = document.getElementsByClassName('pop-full-screen-by-sell');
	sellPop[0].classList.remove('d-block');
	sellPop[0].classList.add('d-none');
}
// var buttonCallBack2 = document.getElementsByClassName('content-for-life-hover__button'); // Подать заявку в блоке для кого
// if(buttonCallBack2.length) {
// 	buttonCallBack2[0].addEventListener( "click" , function(){showSellPop(this)}, false);
// 	buttonCallBack2[1].addEventListener( "click" , function(){showSellPop(this)}, false);
// }
var buttonCallBack3 = document.getElementsByClassName('content-for-life-mobile__button'); // Подать заявку в блоке для кого мобильный
if(buttonCallBack3.length) {
	buttonCallBack3[0].addEventListener( "click" , function(){showSellPop(this)}, false);
	buttonCallBack3[1].addEventListener( "click" , function(){showSellPop(this)}, false);
}
var buttonSell = document.getElementsByClassName('header-button__button_position-sell'); // Кнопка продать в шапке
buttonSell[0].addEventListener( "click" , function(){showSellPop(this)}, false);

var buttonSellM = document.getElementsByClassName('btn_buy'); // Кнопка продать в мобильной шапке
buttonSellM[0].addEventListener( "click" , function(){showSellPop(this)}, false);

var buttonCallBack = document.getElementsByClassName('header-logo-tel__p'); // Номер телефона в шапке
buttonCallBack[0].addEventListener( "click" , function(){showSellPop(this)}, false);

var buttonCallBack1 = document.getElementsByClassName('main-header-mobile__tel'); // Номер телефона в мобильной шапке
buttonCallBack1[0].children[0].addEventListener( "click" , function(){showSellPop(this)}, false);

var buttonCallBack4 = document.getElementsByClassName('main-footer-info__h4'); // Номер телефона в футере
buttonCallBack4[0].addEventListener( "click" , function(){showSellPop(this)}, false);
var buttonCallBack5 = document.getElementsByClassName('main-footer-contacts-right__h5'); // Заказать звонок в футере
buttonCallBack5[0].addEventListener( "click" , function(){showSellPop(this)}, false);
var buttonCallBack6 = document.getElementsByClassName('mobile-footer-content-locations-contacts__h5'); // Заказать звонок в мобильном футере
buttonCallBack6[0].addEventListener( "click" , function(){showSellPop(this)}, false);


var buttonClose = document.getElementsByClassName('pop-full-screen-close-by-sell'); // Крестик в поп-ап
buttonClose[0].addEventListener( "click" , function(){hideSellPop(this)}, false);

// var buttonClose2 = document.getElementsByClassName('pop-table-div__button-by-sell'); // Кнопка в поп-ап
// buttonClose2[0].addEventListener( "click" , function(){hideSellPop(this)}, false);
// Сдать - арендовать
function showRentPop(numberThis){
	var rentPop = document.getElementsByClassName('pop-full-screen-rent');
	rentPop[0].classList.remove('d-none');
	rentPop[0].classList.add('d-block');
	rentPop[0].style.height = document.documentElement.scrollHeight+'px';
}
function hiderentPop(numberThis){
	var rentPop = document.getElementsByClassName('pop-full-screen-rent');
	rentPop[0].classList.remove('d-block');
	rentPop[0].classList.add('d-none');
}
var buttonRent = document.getElementsByClassName('header-button__button_position-rent'); // Кнопка Арендовать в шапке
buttonRent[0].addEventListener( "click" , function(){showRentPop(this)}, false);

var buttonRentM = document.getElementsByClassName('btn_rent'); // Кнопка Арендовать в Мобильной шапке
buttonRentM[0].addEventListener( "click" , function(){showRentPop(this)}, false);

var buttonCloseRent = document.getElementsByClassName('pop-full-screen-close-rent'); // Крестик в поп-ап
buttonCloseRent[0].addEventListener( "click" , function(){hiderentPop(this)}, false);

// var buttonCloseRent2 = document.getElementsByClassName('pop-table-div__button-rent'); // Кнопка в поп-ап
// buttonCloseRent2[0].addEventListener( "click" , function(){hiderentPop(this)}, false);
// Вход 
// function showEnter(numberThis){
// 	console.log(3);
// 	var enterPop = document.getElementsByClassName('pop-full-screen-enter');
// 	hideRegForm();
// 	enterPop[0].classList.remove('d-none');
// 	enterPop[0].classList.add('d-block');
// 	enterPop[0].style.height = document.documentElement.scrollHeight+'px';
// }
function hideEnter(numberThis){
	var enterPop = document.getElementsByClassName('pop-full-screen-enter');
	enterPop[0].classList.remove('d-block');
	enterPop[0].classList.add('d-none');
}
// var buttonLogin = document.getElementsByClassName('header-logo-body-img'); // Иконка человека в шапке
// for(var i =0; i<buttonLogin.length; i++){
// buttonLogin[i].addEventListener( "click" , function(){showEnter(this)}, false);
// }

// var buttonLogin2 = document.getElementsByClassName('pop-table-enter__a-enter'); // Крестик в поп-ап
// buttonLogin2[0].addEventListener( "click" , function(){showEnter(this)}, false);

var buttonCloseEnter = document.getElementsByClassName('pop-full-screen-close-enter');  // Кнопка в поп-ап
buttonCloseEnter[0].addEventListener( "click" , function(){hideEnter(this)}, false);

// Вход - пароль
function showEnterCode(numberThis){
	var enterPop = document.getElementsByClassName('pop-full-screen-enter-code');
	hideEnter();
	enterPop[0].classList.remove('d-none');
	enterPop[0].classList.add('d-block');
	enterPop[0].style.height = document.documentElement.scrollHeight+'px';
}
// function hideEnterCode(numberThis){
// 	var enterPop = document.getElementsByClassName('pop-full-screen-enter-code');
// 	enterPop[0].classList.remove('d-block');
// 	enterPop[0].classList.add('d-none');
// 	enterPop[0].style.height = document.documentElement.scrollHeight+'px';
// 	if(numberThis.innerHTML == 'Войти') {
// 		window.location = "favorites.html";
// 	}
// }
var buttonEnterCode = document.getElementsByClassName('pop-table__button_enter-code');
buttonEnterCode[0].addEventListener( "click" , function(){showEnterCode(this)}, false);
// var buttonCloseEnterCode = document.getElementsByClassName('pop-full-screen-close-enter-code');
// buttonCloseEnterCode[0].addEventListener( "click" , function(){hideEnterCode(this)}, false);
// var buttonCloseEnterCode2 = document.getElementsByClassName('pop-table__button_enter');
// buttonCloseEnterCode2[0].addEventListener( "click" , function(){hideEnterCode(this)}, false);
// // Регистрация
function showRegForm(numberThis){
	var regPop = document.getElementsByClassName('pop-full-screen-reg');
	hideEnter();
	regPop[0].classList.remove('d-none');
	regPop[0].classList.add('d-block');
	regPop[0].style.height = document.documentElement.scrollHeight+'px';
}
function hideRegForm(numberThis){
	var regPop = document.getElementsByClassName('pop-full-screen-reg');
	regPop[0].classList.remove('d-block');
	regPop[0].classList.add('d-none');
}
var buttonRegPop = document.getElementsByClassName('pop-table-enter__a-reg');
buttonRegPop[0].addEventListener( "click" , function(){showRegForm(this)}, false);
var buttonCloseRegPop = document.getElementsByClassName('pop-full-screen-reg-enter');
buttonCloseRegPop[0].addEventListener( "click" , function(){hideRegForm(this)}, false);
// Регистрация - пароль
function showRegCode(numberThis){
	var enterPop = document.getElementsByClassName('pop-full-screen-reg-code');
	hideRegForm();
	enterPop[0].classList.remove('d-none');
	enterPop[0].classList.add('d-block');
	enterPop[0].style.height = document.documentElement.scrollHeight+'px';
}
function hideRegCode(numberThis){
	var enterPop = document.getElementsByClassName('pop-full-screen-reg-code');
	enterPop[0].classList.remove('d-block');
	enterPop[0].classList.add('d-none');
}
var buttonRegCode = document.getElementsByClassName('pop-table__button_reg-code');
var buttonCloseRegCode = document.getElementsByClassName('pop-full-screen-close-reg-code');
var buttonCloseRegCode2 = document.getElementsByClassName('pop-table__button_reg');
if(buttonRegCode.length) {
	buttonRegCode[0].addEventListener( "click" , function(){showRegCode(this)}, false);
}
if(buttonCloseRegCode.length) {
	buttonCloseRegCode[0].addEventListener( "click" , function(){hideRegCode(this)}, false);
}
if(buttonCloseRegCode2.length) {
	buttonCloseRegCode2[0].addEventListener( "click" , function(){hideRegCode(this)}, false);
}
// Карта
function showMap(numberThis){
	var enterPop = document.getElementsByClassName('pop-full-screen-map');
	enterPop[0].classList.remove('d-none');
	enterPop[0].classList.add('d-block');
	enterPop[0].style.height = document.documentElement.scrollHeight+'px';
}
function hideMap(numberThis){
	var enterPop = document.getElementsByClassName('pop-full-screen-map');
	enterPop[0].classList.remove('d-block');
	enterPop[0].classList.add('d-none');
}
var buttonRegCode = document.getElementsByClassName('content-object-card-around-o-img'); // показать карту
var buttonCloseRegCode = document.getElementsByClassName('pop-full-screen-close-map'); // Убрать карту
if(buttonRegCode.length) {
	buttonRegCode[0].addEventListener( "click" , function(){showMap(this)}, false);
}
if(buttonCloseRegCode.length) {
	buttonCloseRegCode[0].addEventListener( "click" , function(){hideMap(this)}, false);
}
// Подробнее
// function showInfo(numberThis){
// 	console.log(3);
// 	var enterPop = document.getElementsByClassName('pop-full-screen-info');
// 	enterPop[0].classList.remove('d-none');
// 	enterPop[0].classList.add('d-block');
// 	enterPop[0].style.height = document.documentElement.scrollHeight+'px';
// }
// function hideInfo(numberThis){
// 	var enterPop = document.getElementsByClassName('pop-full-screen-info');
// 	enterPop[0].classList.remove('d-block');
// 	enterPop[0].classList.add('d-none');
// }
// var buttonRegCode = document.getElementsByClassName('content-object-card-information-button-details'); // показать Подробнее
// buttonRegCode[0].addEventListener( "click" , function(){showInfo(this)}, false);
// var buttonCloseRegCode = document.getElementsByClassName('pop-full-screen-close-info'); // Убрать Подробнее
// buttonCloseRegCode[0].addEventListener( "click" , function(){hideInfo(this)}, false);
// buttonCloseRegCode[1].addEventListener( "click" , function(){hideInfo(this)}, false);
// прокрутка
// function showY(){
// 	var enterPop = document.getElementsByClassName('paddin-pop');
// 	if(window.pageYOffset > 700) {
// 		enterPop[0].style.marginTop = (window.pageYOffset-650)+'px';
// 	} else if (window.pageYOffset < 100) {
// 		enterPop[0].style.marginTop = (window.pageYOffset)+'px';
// 	}
// }
// window.addEventListener('scroll', function(){showY()}, false);
// Подробнее
function showInfo(numberThis){
	var enterPop = document.querySelector('.pop-full-screen-info');
	enterPop.classList.remove('d-none');
	enterPop.classList.add('d-block');
	enterPop.style.height = document.documentElement.scrollHeight+'px';
}
function hideInfo(numberThis){
	let enterPop1 = document.querySelector('.pop-full-screen-info');
	enterPop1.classList.remove('d-block');
	enterPop1.classList.add('d-none');
}
let buttonRegCode1 = document.querySelectorAll('.content-specials-link__button'); // показать Подробнее
if(buttonRegCode1.length){
	for (var i = 0; i < buttonRegCode1.length; i++) {
		buttonRegCode1[i].addEventListener( "click" , function(){showInfo(this)}, false);
	}
}
let buttonCloseRegCode1 = document.querySelectorAll('.pop-full-screen-close_position'); // Убрать Подробнее
if(buttonCloseRegCode1.length) {
	buttonCloseRegCode1.forEach( el => {
		el.addEventListener('click', (e) => {
			hideInfo(this);
		})
	})
}