// мобильное меню
// выбор города
// function showMobileMenu(obj){
// 	console.log(5);
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
	console.log(1)
	if(numberThis.children[0].classList.contains('far')) {
		numberThis.children[0].classList.remove('far');
		numberThis.children[0].classList.add('fas');
	} else {
		numberThis.children[0].classList.remove('fas');
		numberThis.children[0].classList.add('far');
	}
}
// function viewAllPartners(numberThis){
// 	var parent = numberThis.parentNode.parentNode;
// 	numberThis.classList.add('d-none');
// 	for (var i = 0; i < parent.children.length; i++) {
// 		if(i==0) {
// 			parent.children[i].classList.add('d-none');
// 			continue;
// 		}
// 		if(parent.children[i].classList.contains('d-none')) {
// 			parent.children[i].classList.remove('d-none');
// 		}
// 	}
// }
// var slider = document.getElementsByClassName('slide-image-div'); // div с изображением
// var sliderLeftButton = document.getElementsByClassName('slide-image-div-left'); // div ср стрелкой влево
// var sliderRightButton = document.getElementsByClassName('slide-image-div-right'); // div ср стрелкой вправо
// var navigationBar = document.getElementsByClassName('slide-image-div-navi'); // div с пагинацией
// var hearts = document.getElementsByClassName('content-specials-heart'); // div с сердцем
// var allPartners = document.getElementsByClassName('content-partners-all__button'); // кнопка - показать всех партнеров

// if(allPartners.length) {
// 	allPartners[0].addEventListener( "click" , function(){viewAllPartners(this)}, false);
// }
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
// 	for (var i = 1; i < slider.length; i++) {
// 		slider[i].count = i;
// 		//slider[i].addEventListener( "click" , () => console.log(this));
// 		sliderLeftButton[i].count = i;
// 		sliderLeftButton[i].addEventListener( "click" , function(){changeUrlLeft(this)}, false);
// 		sliderRightButton[i].count = i;
// 		sliderRightButton[i].addEventListener( "click" , function(){changeUrlRight(this)}, false);
// 		hearts[i].addEventListener( "click" , function(){
// 			console.log($(this));
// 		}, false);
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
// 	parent.children[0].children[0].style.opacity = '1';
// 	parent.children[0].classList.add('d-none');
// 	// второй блок - становится первым
// 	parent.children[1].classList.remove('d-none');
// 	parent.children[1].classList.remove('d-sm-block');
// 	// третий блок - становится вторым
// 	parent.children[2].classList.add('d-sm-block');
// 	parent.children[2].classList.remove('d-lg-block');
// 	// Четвертый - становится третим
// 	parent.children[3].classList.add('d-lg-block');
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
// 	}
// 	if(maxElWidth > 575 && maxElWidth <= 991) {
// 		// два блока - разрешение от 576 до 991
// 		setTimeout(elHideRight, 15, numberThis.children[1].children[0], opacityValue, transformValue);
// 	}
// 	if(maxElWidth > 991) {
// 		// три блока - разрешение 992 и больше
// 		setTimeout(elHideRight, 15, numberThis.children[2].children[0], opacityValue, transformValue);
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
// 	// последний блок - становится первым
// 	parent.children[numberThis.parentNode.children.length].classList.remove('d-none');
// 	// первый блок - становится вторым
// 	parent.children[0].classList.add('d-none');
// 	parent.children[0].classList.add('d-sm-block');
// 	// второй блок - становится третим
// 	parent.children[1].classList.remove('d-sm-block');
// 	parent.children[1].classList.add('d-lg-block');
// 	// третий пропадает
// 	parent.children[2].classList.add('d-none');
// 	parent.children[2].classList.remove('d-lg-block');
// 	var lastCh = numberThis.parentNode.children[1].children[numberThis.parentNode.children.length];
// 	parent.prepend(lastCh);
// }
// var sliderNumber = document.getElementsByClassName('content-specials-list-slider'); // div со слайдером 
// for(var i = 0; i < sliderNumber.length; i++){
// 	sliderNumber[i].children[0].addEventListener( "click" , function(){elMoveToLeft(this.parentNode.children[1].children[0].children[0])}, false); // левая стрелка
// 	sliderNumber[i].children[2].addEventListener( "click" , function(){elMoveToRight(this.parentNode.children[1])}, false); // правая стрелка стрелка
// }
// показать /спрятать мобильно меню 
// function showMMenu(){
// 	console.log(2);
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
var buttonSell = document.getElementsByClassName('header-button__button_position-sell'); // Кнопка продать в шапке
var buttonSellM = document.getElementsByClassName('btn_buy'); // Кнопка продать в мобильной шапке
var buttonCallBack = document.getElementsByClassName('header-logo-tel__p'); // Номер телефона в шапке
var buttonCallBack1 = document.getElementsByClassName('main-header-mobile__tel'); // Номер телефона в мобильной шапке
// var buttonCallBack2 = document.getElementsByClassName('content-for-life-hover__button'); // Подать заявку в блоке для кого
var buttonCallBack4 = document.getElementsByClassName('main-footer-info__h4'); // Номер телефона в футере
var buttonCallBack5 = document.getElementsByClassName('main-footer-contacts-right__h5'); // Заказать звонок в футере
var buttonCallBack6 = document.getElementsByClassName('mobile-footer-content-locations-contacts__h5'); // Заказать звонок в мобильном футере
console.log(buttonCallBack2);
if(buttonSell.length) {
	buttonSell[0].addEventListener( "click" , function(){showSellPop(this)}, false);
}
if(buttonSellM.length) {
	buttonSellM[0].addEventListener( "click" , function(){showSellPop(this)}, false);
} 
if(buttonCallBack.length) {
	buttonCallBack[0].addEventListener( "click" , function(){showSellPop(this)}, false);
}
if(buttonCallBack1.length) {
	buttonCallBack1[0].children[0].addEventListener( "click" , function(){showSellPop(this)}, false);
}
// if(buttonCallBack2.length) {
	
// 	buttonCallBack2[0].addEventListener( "click" , function(){showSellPop(this)}, false);
// 	buttonCallBack2[1].addEventListener( "click" , function(){showSellPop(this)}, false);
// }
if(buttonCallBack4.length) {
	buttonCallBack4[0].addEventListener( "click" , function(){showSellPop(this)}, false);
}
if(buttonCallBack5.length) {
	buttonCallBack5[0].addEventListener( "click" , function(){showSellPop(this)}, false);
}
if(buttonCallBack6.length) {
	buttonCallBack6[0].addEventListener( "click" , function(){showSellPop(this)}, false);
}


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
// 	console.log(2);
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
(buttonRegCode, buttonCloseRegCode, buttonCloseRegCode2) => {
	buttonRegCode[0].addEventListener( "click" , function(){showRegCode(this)}, false);
	buttonCloseRegCode[0].addEventListener( "click" , function(){hideRegCode(this)}, false);
	buttonCloseRegCode2[0].addEventListener( "click" , function(){hideRegCode(this)}, false);
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
// var bigleftButton = document.getElementsByClassName('big-slide-image-div-left'); // div со стрелкой влево большое фото
// bigleftButton[0].addEventListener( "click" , function(){changeBigToLeft(this)}, false);
// bigleftButton[1].addEventListener( "click" , function(){changeBigToLeft(this)}, false);
// var bigRightButton = document.getElementsByClassName('big-slide-image-div-right'); // div со стрелкой вправо большое фото
// bigRightButton[0].addEventListener( "click" , function(){changeBigToRight(this)}, false);
// bigRightButton[1].addEventListener( "click" , function(){changeBigToRight(this)}, false);
var bigHearts = document.getElementsByClassName('big-slide-image-div__h4'); // div с сердцем большое фото
bigHearts[0].addEventListener( "click" , function(){changeHeart(this)}, false);
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