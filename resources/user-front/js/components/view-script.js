// показать /спрятать мобильно меню
function showMMenu() {
    var mobileMenu = document.getElementsByClassName(
        "main-header-mobile-content-active"
    ); // класс мобильного меню
    if (mobileMenu[0].classList.contains("d-none")) {
        mobileMenu[0].classList.remove("d-none");
    } else {
        mobileMenu[0].classList.add("d-none");
    }
}

var btnMobileMenu = document.getElementsByClassName(
    "main-header-mobile__3gram"
); // Иконка 3грамм в мобильной шапке
if (btnMobileMenu.length) {
    btnMobileMenu[0].children[0].addEventListener(
        "click",
        function() {
            showMMenu();
        },
        false
    );
}
// выбор города
function showMobileMenu(obj) {
    if (
        obj.parentNode.parentNode.children[
            obj.parentNode.parentNode.children.length - 1
        ].classList.contains("d-none")
    ) {
        obj.parentNode.parentNode.children[
            obj.parentNode.parentNode.children.length - 1
        ].classList.remove("d-none");
    } else {
        obj.parentNode.parentNode.children[
            obj.parentNode.parentNode.children.length - 1
        ].classList.add("d-none");
    }
}
function chooseCity(obj) {
    for (
        var i = 0;
        i < obj.parentNode.parentNode.parentNode.children.length;
        i++
    ) {
        if (obj.count == i) {
            obj.parentNode.parentNode.parentNode.children[i].classList.remove(
                "d-none"
            );
            obj.parentNode.parentNode.parentNode.children[i].classList.add(
                "d-block"
            );
        } else {
            obj.parentNode.parentNode.parentNode.children[i].classList.remove(
                "d-block"
            );
            obj.parentNode.parentNode.parentNode.children[i].classList.add(
                "d-none"
            );
        }
    }
}
var mobileMenuCity = document.getElementsByClassName("mobile-up-menu-adress"); // Ссылка с выбором города Москва/Сочи
for (var i = 0; i < mobileMenuCity.length; i++) {
    mobileMenuCity[i].addEventListener(
        "click",
        function() {
            showMobileMenu(this);
        },
        false
    );
}
var mobileMenuChooseCity = document.getElementsByClassName(
    "mobile-d-menu-adress"
); // Ссылка с выбором города Москва/Сочи
for (var i = 0; i < mobileMenuChooseCity.length; i++) {
    mobileMenuChooseCity[i].count = i;
    mobileMenuChooseCity[i].addEventListener(
        "click",
        function() {
            chooseCity(this);
        },
        false
    );
}

function hideMap(el) {
    console.log(1);
    el.classList.add("d-none");
    el.nextElementSibling.children[0].classList.remove("row-cols-sm-2");
    el.nextElementSibling.children[0].children[0].classList.remove("col-sm-6");
    el.nextElementSibling.children[0].children[0].classList.remove("col-md-7");
    el.nextElementSibling.children[0].children[1].classList.add("d-none");
    el.nextElementSibling.children[0].children[2].classList.remove(
        "d-md-block"
    );
}

var hideMapButton = document.getElementsByClassName(
    "content-residential-button"
); // Кнопка убрать карту

if (hideMapButton.length) {
    hideMapButton[0].addEventListener(
        "click",
        function() {
            hideMap(this);
        },
        false
    );
}
// активность поп-апов
// всплывает при нажатии на кнопу в меню
// Купить - продать
var sellPop = document.getElementsByClassName("pop-full-screen-by-sell");
function showSellPop(numberThis) {
    console.log(1);
    sellPop[0].classList.remove("d-none");
    sellPop[0].classList.add("d-block");
    sellPop[0].style.height = document.documentElement.scrollHeight + "px";
}
function hideSellPop(numberThis) {
    sellPop[0].classList.remove("d-block");
    sellPop[0].classList.add("d-none");
}
var buttonSell = document.getElementsByClassName(
    "header-button__button_position-sell"
); // Кнопка продать в шапке
if (buttonSell.length) {
    buttonSell[0].addEventListener(
        "click",
        function() {
            showSellPop(this);
        },
        false
    );
}
var buttonSellM = document.getElementsByClassName("btn_buy"); // Кнопка продать в мобильной шапке
if (buttonSellM.length) {
    buttonSellM[0].addEventListener(
        "click",
        function() {
            showSellPop(this);
        },
        false
    );
}
var buttonCallBack = document.getElementsByClassName("header-logo-tel__p"); // Номер телефона в шапке
if (buttonCallBack.length) {
    buttonCallBack[0].addEventListener(
        "click",
        function() {
            showSellPop(this);
        },
        false
    );
}
var buttonCallBack1 = document.getElementsByClassName(
    "main-header-mobile__tel"
); // Номер телефона в мобильной шапке

if (buttonCallBack1.length) {
    buttonCallBack1[0].children[0].addEventListener(
        "click",
        function() {
            showSellPop(this);
        },
        false
    );
}

var buttonCallBack4 = document.getElementsByClassName("main-footer-info__h4"); // Номер телефона в футере
if (buttonCallBack4.length) {
    buttonCallBack4[0].addEventListener(
        "click",
        function() {
            showSellPop(this);
        },
        false
    );
}
var buttonCallBack5 = document.getElementsByClassName(
    "main-footer-contacts-right__h5"
); // Заказать звонок в футере
if (buttonCallBack5.length) {
    buttonCallBack5[0].addEventListener(
        "click",
        function() {
            showSellPop(this);
        },
        false
    );
}
var buttonCallBack6 = document.getElementsByClassName(
    "mobile-footer-content-locations-contacts__h5"
); // Заказать звонок в мобильном футере
if (buttonCallBack6.length) {
    buttonCallBack6[0].addEventListener(
        "click",
        function() {
            showSellPop(this);
        },
        false
    );
}
// var buttonCallBack2 = document.getElementsByClassName('content-for-life-hover__button'); // Подать заявку в блоке для кого
// if(buttonCallBack2.length) {
// 	buttonCallBack2[0].addEventListener( "click" , function(){showSellPop(this)}, false);
// 	buttonCallBack2[1].addEventListener( "click" , function(){showSellPop(this)}, false);
// }

/* Дубликат кода
var buttonClose = document.getElementsByClassName('pop-full-screen-close-by-sell'); // Крестик в поп-ап
buttonClose[0].addEventListener( "click" , function(){hideSellPop(this)}, false);
*/

var buttonClose2 = document.getElementsByClassName(
    "pop-table-div__button-by-sell"
); // Кнопка в поп-ап
if (buttonClose2.length) {
    buttonClose2[0].addEventListener(
        "click",
        function() {
            hideSellPop(this);
        },
        false
    );
}
// // Сдать - арендовать
// function showRentPop(numberThis){
// 	var rentPop = document.getElementsByClassName('pop-full-screen-rent');
// 	rentPop[0].classList.remove('d-none');
// 	rentPop[0].classList.add('d-block');
// 	rentPop[0].style.height = document.documentElement.scrollHeight+'px';
// }
function hiderentPop(numberThis) {
    var rentPop = document.getElementsByClassName("pop-full-screen-rent");
    rentPop[0].classList.remove("d-block");
    rentPop[0].classList.add("d-none");
}
function hiderentPopMes(numberThis) {
    var rentPopMes = document.getElementsByClassName("message");
    rentPopMes[0].classList.remove("d-block");
    rentPopMes[0].classList.add("d-none");
}
var buttonRent = document.getElementsByClassName(
    "header-button__button_position-rent"
); // Кнопка Арендовать в шапке
if (buttonRent.length) {
    buttonRent[0].addEventListener(
        "click",
        function() {
            showRentPop(this);
        },
        false
    );
}
var buttonRentM = document.getElementsByClassName("btn_rent"); // Кнопка Арендовать в Мобильной шапке
if (buttonRentM.length) {
    buttonRentM[0].addEventListener(
        "click",
        function() {
            showRentPop(this);
        },
        false
    );
}
var buttonCloseRent = document.getElementsByClassName(
    "pop-full-screen-close-rent"
); // Крестик в поп-ап
if (buttonCloseRent.length) {
    buttonCloseRent[0].addEventListener(
        "click",
        function() {
            hiderentPop(this);
        },
        false
    );
}
var buttonCloseRentMes = document.getElementsByClassName(
    "pop-full-screen-close-mes"
); // Крестик в поп-ап
if (buttonCloseRentMes.length) {
    buttonCloseRentMes[0].addEventListener(
        "click",
        function() {
            hiderentPopMes(this);
        },
        false
    );
}
// var buttonCloseRent2 = document.getElementsByClassName('pop-table-div__button-rent'); // Кнопка в поп-ап
// buttonCloseRent2[0].addEventListener( "click" , function(){hiderentPop(this)}, false);
// Вход
// function showEnter(numberThis){
// 	console.log(1);
// 	var enterPop = document.getElementsByClassName('pop-full-screen-enter');
// 	hideRegForm();
// 	enterPop[0].classList.remove('d-none');
// 	enterPop[0].classList.add('d-block');
// 	enterPop[0].style.height = document.documentElement.scrollHeight+'px';
// }
function hideEnter(numberThis) {
    var enterPop = document.getElementsByClassName("pop-full-screen-enter");
    enterPop[0].classList.remove("d-block");
    enterPop[0].classList.add("d-none");
}
// var buttonLogin = document.getElementsByClassName('header-logo-body-img'); // Иконка человека в шапке
// for(var i =0; i<buttonLogin.length; i++){
// 	buttonLogin[i].addEventListener( "click" , function(){showEnter(this)}, false);
// }

// var buttonLogin2 = document.getElementsByClassName('pop-table-enter__a-enter'); // Крестик в поп-ап
// buttonLogin2[0].addEventListener( "click" , function(){showEnter(this)}, false);

var buttonCloseEnter = document.getElementsByClassName(
    "pop-full-screen-close-enter"
); // Кнопка в поп-ап
if (buttonCloseEnter.length) {
    buttonCloseEnter[0].addEventListener(
        "click",
        function() {
            hideEnter(this);
        },
        false
    );
}
// Вход - пароль
function showEnterCode(numberThis) {
    var enterPop = document.getElementsByClassName(
        "pop-full-screen-enter-code"
    );
    hideEnter();
    enterPop[0].classList.remove("d-none");
    enterPop[0].classList.add("d-block");
    enterPop[0].style.height = document.documentElement.scrollHeight + "px";
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
var buttonEnterCode = document.getElementsByClassName(
    "pop-table__button_enter-code"
);
if (buttonEnterCode.length) {
    buttonEnterCode[0].addEventListener(
        "click",
        function() {
            showEnterCode(this);
        },
        false
    );
}
// var buttonCloseEnterCode = document.getElementsByClassName('pop-full-screen-close-enter-code');
// buttonCloseEnterCode[0].addEventListener( "click" , function(){hideEnterCode(this)}, false);
// var buttonCloseEnterCode2 = document.getElementsByClassName('pop-table__button_enter');
// buttonCloseEnterCode2[0].addEventListener( "click" , function(){hideEnterCode(this)}, false);
// Регистрация
function showRegForm(numberThis) {
    var regPop = document.getElementsByClassName("pop-full-screen-reg");
    hideEnter();
    regPop[0].classList.remove("d-none");
    regPop[0].classList.add("d-block");
    regPop[0].style.height = document.documentElement.scrollHeight + "px";
}
function hideRegForm(numberThis) {
    var regPop = document.getElementsByClassName("pop-full-screen-reg");
    regPop[0].classList.remove("d-block");
    regPop[0].classList.add("d-none");
}
var buttonRegPop = document.getElementsByClassName("pop-table-enter__a-reg");
if (buttonRegPop.length) {
    buttonRegPop[0].addEventListener(
        "click",
        function() {
            showRegForm(this);
        },
        false
    );
}
var buttonCloseRegPop = document.getElementsByClassName(
    "pop-full-screen-reg-enter"
);
if (buttonCloseRegPop.length) {
    buttonCloseRegPop[0].addEventListener(
        "click",
        function() {
            hideRegForm(this);
        },
        false
    );
}
// Регистрация - пароль
function showRegCode(numberThis) {
    var enterPop = document.getElementsByClassName("pop-full-screen-reg-code");
    hideRegForm();
    enterPop[0].classList.remove("d-none");
    enterPop[0].classList.add("d-block");
    enterPop[0].style.height = document.documentElement.scrollHeight + "px";
}
function hideRegCode(numberThis) {
    var enterPop = document.getElementsByClassName("pop-full-screen-reg-code");
    enterPop[0].classList.remove("d-block");
    enterPop[0].classList.add("d-none");
}
var buttonRegCode = document.getElementsByClassName(
    "pop-table__button_reg-code"
);
buttonRegCode => {
    buttonRegCode[0].addEventListener(
        "click",
        function() {
            showRegCode(this);
        },
        false
    );
};
var buttonCloseRegCode = document.getElementsByClassName(
    "pop-full-screen-close-reg-code"
);
buttonCloseRegCode => {
    buttonCloseRegCode[0].addEventListener(
        "click",
        function() {
            hideRegCode(this);
        },
        false
    );
};
var buttonCloseRegCode2 = document.getElementsByClassName(
    "pop-table__button_reg"
);
buttonCloseRegCode2 => {
    buttonCloseRegCode2[0].addEventListener(
        "click",
        function() {
            hideRegCode(this);
        },
        false
    );
};
