// мобильное меню
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
// выбор квартиры
var mobileMenuRoom = document.getElementsByClassName("mobile-up-menu-rooms"); // Ссылка с квартиры
for (var i = 0; i < mobileMenuRoom.length; i++) {
    mobileMenuRoom[i].addEventListener(
        "click",
        function() {
            showMobileMenu(this);
        },
        false
    );
}
// Жилые комплексы
var mobileMenuRes = document.getElementsByClassName(
    "mobile-up-menu-residentials"
); // Ссылка с выбором жилого комплекса
for (var i = 0; i < mobileMenuRes.length; i++) {
    mobileMenuRes[i].addEventListener(
        "click",
        function() {
            showMobileMenu(this);
        },
        false
    );
}
// Дома
var mobileMenuHouse = document.getElementsByClassName("mobile-up-menu-houses"); // Ссылка с выбором дома
for (var i = 0; i < mobileMenuHouse.length; i++) {
    mobileMenuHouse[i].addEventListener(
        "click",
        function() {
            showMobileMenu(this);
        },
        false
    );
}
// земля
var mobileMenuLand = document.getElementsByClassName("mobile-up-menu-lands"); // Ссылка с земли
for (var i = 0; i < mobileMenuLand.length; i++) {
    mobileMenuLand[i].addEventListener(
        "click",
        function() {
            showMobileMenu(this);
        },
        false
    );
}
// недвижимость
var mobileMenuEstate = document.getElementsByClassName(
    "mobile-up-menu-estates"
); // Ссылка с недвижимости
for (var i = 0; i < mobileMenuEstate.length; i++) {
    mobileMenuEstate[i].addEventListener(
        "click",
        function() {
            showMobileMenu(this);
        },
        false
    );
}
// показать / спрятать мобильно меню
// function showMMenu(){
// 	var mobileMenu = document.getElementsByClassName('main-header-mobile-content-active'); // класс мобильного меню
// 	if(mobileMenu[0].classList.contains('d-none').length){
// 		mobileMenu[0].classList.remove('d-none');
// 	}
// }
// var buttonLogin1 = document.getElementsByClassName('main-header-mobile__3gram'); // Иконка 3грамм в мобильной шапке
// buttonLogin1[0].children[0].addEventListener( "click" , function(){showMMenu()}, false);
// активность поп-апов
// всплывает при нажатии на кнопу в меню
// Купить - продать
function showSellPop(numberThis) {
    var sellPop = document.getElementsByClassName("pop-full-screen-by-sell");
    sellPop[0].classList.remove("d-none");
    sellPop[0].classList.add("d-block");
    sellPop[0].style.height = document.documentElement.scrollHeight + "px";
}
function hideSellPop(numberThis) {
    var sellPop = document.getElementsByClassName("pop-full-screen-by-sell");
    sellPop[0].classList.remove("d-block");
    sellPop[0].classList.add("d-none");
}

var buttonCallBackMob2 = document.getElementsByClassName(
    "content-for-life-mobile__button"
); // Подать заявку в блоке для кого
var buttonCallBack2 = document.getElementsByClassName(
    "content-for-life-hover__button"
); // Подать заявку в блоке для кого
if (buttonCallBack2.length) {
    buttonCallBack2[0].addEventListener(
        "click",
        function() {
            showSellPop(this);
        },
        false
    );
    buttonCallBack2[1].addEventListener(
        "click",
        function() {
            showSellPop(this);
        },
        false
    );
}
if (buttonCallBackMob2.length) {
    buttonCallBackMob2[0].addEventListener(
        "click",
        function() {
            showSellPop(this);
        },
        false
    );
    buttonCallBackMob2[1].addEventListener(
        "click",
        function() {
            showSellPop(this);
        },
        false
    );
}
var buttonSell = document.getElementsByClassName(
    "header-button__button_position-sell"
); // Кнопка продать в шапке
buttonSell[0].addEventListener(
    "click",
    function() {
        showSellPop(this);
    },
    false
);

var buttonSellM = document.getElementsByClassName("btn_buy"); // Кнопка продать в мобильной шапке
buttonSellM[0].addEventListener(
    "click",
    function() {
        showSellPop(this);
    },
    false
);

var buttonCallBack = document.getElementsByClassName("header-logo-tel__p"); // Номер телефона в шапке
buttonCallBack[0].addEventListener(
    "click",
    function() {
        showSellPop(this);
    },
    false
);

var buttonCallBack1 = document.getElementsByClassName(
    "main-header-mobile__tel"
); // Номер телефона в мобильной шапке
buttonCallBack1[0].children[0].addEventListener(
    "click",
    function() {
        showSellPop(this);
    },
    false
);

var buttonCallBack4 = document.getElementsByClassName("main-footer-info__h4"); // Номер телефона в футере
buttonCallBack4[0].addEventListener(
    "click",
    function() {
        showSellPop(this);
    },
    false
);
var buttonCallBack5 = document.getElementsByClassName(
    "main-footer-contacts-right__h5"
); // Заказать звонок в футере
buttonCallBack5[0].addEventListener(
    "click",
    function() {
        showSellPop(this);
    },
    false
);
var buttonCallBack6 = document.getElementsByClassName(
    "mobile-footer-content-locations-contacts__h5"
); // Заказать звонок в мобильном футере
buttonCallBack6[0].addEventListener(
    "click",
    function() {
        showSellPop(this);
    },
    false
);

/*
var buttonClose = document.getElementsByClassName(
    "pop-full-screen-close-by-sell"
); // Крестик в поп-ап

buttonClose[0].addEventListener(
    "click",
    function() {
        hideSellPop(this);
    },
    false
);
*/
// var buttonClose2 = document.getElementsByClassName('pop-table-div__button-by-sell'); // Кнопка в поп-ап
// buttonClose2[0].addEventListener( "click" , function(){hideSellPop(this)}, false);
// Сдать - арендовать
// function showRentPop(numberThis) {
//     var rentPop = document.getElementsByClassName("pop-full-screen-rent");
//     rentPop[0].classList.remove("d-none");
//     rentPop[0].classList.add("d-block");
//     rentPop[0].style.height = document.documentElement.scrollHeight + "px";
// }
function hiderentPop(numberThis) {
    var rentPop = document.getElementsByClassName("pop-full-screen-rent");
    rentPop[0].classList.remove("d-block");
    rentPop[0].classList.add("d-none");
}
var buttonRent = document.getElementsByClassName(
    "header-button__button_position-rent"
); // Кнопка Арендовать в шапке
buttonRent[0].addEventListener(
    "click",
    function() {
        showRentPop(this);
    },
    false
);

var buttonRentM = document.getElementsByClassName("btn_rent"); // Кнопка Арендовать в Мобильной шапке
buttonRentM[0].addEventListener(
    "click",
    function() {
        showRentPop(this);
    },
    false
);

var buttonCloseRent = document.getElementsByClassName(
    "pop-full-screen-close-rent"
); // Крестик в поп-ап
buttonCloseRent[0].addEventListener(
    "click",
    function() {
        hiderentPop(this);
    },
    false
);

var buttonCloseRent2 = document.getElementsByClassName(
    "pop-table-div__button-rent"
); // Кнопка в поп-ап
if (buttonCloseRent2.length) {
    buttonCloseRent2[0].addEventListener(
        "click",
        function() {
            hiderentPop(this);
        },
        false
    );
}
// Вход
// function showEnter(numberThis){
// 	console.log(6);
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
// buttonLogin[i].addEventListener( "click" , function(){showEnter(this)}, false);
// }

// var buttonLogin2 = document.getElementsByClassName('pop-table-enter__a-enter'); // Крестик в поп-ап
// buttonLogin2[0].addEventListener( "click" , function(){showEnter(this)}, false);

var buttonCloseEnter = document.getElementsByClassName(
    "pop-full-screen-close-enter"
); // Кнопка в поп-ап
buttonCloseEnter[0].addEventListener(
    "click",
    function() {
        hideEnter(this);
    },
    false
);

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
function hideEnterCode(numberThis) {
    var enterPop = document.getElementsByClassName(
        "pop-full-screen-enter-code"
    );
    enterPop[0].classList.remove("d-block");
    enterPop[0].classList.add("d-none");
    enterPop[0].style.height = document.documentElement.scrollHeight + "px";
    if (numberThis.innerHTML == "Войти") {
        window.location = "favorites.html";
    }
}
var buttonEnterCode = document.getElementsByClassName(
    "pop-table__button_enter-code"
);
buttonEnterCode[0].addEventListener(
    "click",
    function() {
        showEnterCode(this);
    },
    false
);
var buttonCloseEnterCode = document.getElementsByClassName(
    "pop-full-screen-close-enter-code"
);
buttonCloseEnterCode[0].addEventListener(
    "click",
    function() {
        hideEnterCode(this);
    },
    false
);
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
buttonRegPop[0].addEventListener(
    "click",
    function() {
        showRegForm(this);
    },
    false
);
var buttonCloseRegPop = document.getElementsByClassName(
    "pop-full-screen-reg-enter"
);
buttonCloseRegPop[0].addEventListener(
    "click",
    function() {
        hideRegForm(this);
    },
    false
);
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
// var buttonCloseRegCode = document.getElementsByClassName('pop-full-screen-close-reg-code');
// var buttonCloseRegCode2 = document.getElementsByClassName('pop-table__button_reg');

// if(buttonRegCode.length) {
// 	buttonCloseRegCode2[0].addEventListener( "click" , function(){hideRegCode(this)}, false);
// }
// if(buttonCloseRegCode.length) {
// 	buttonRegCode[0].addEventListener( "click" , function(){showRegCode(this)}, false);
// }
// if(buttonCloseRegCode2.length) {
// 	buttonCloseRegCode[0].addEventListener( "click" , function(){hideRegCode(this)}, false);
// }
// Подробнее
function showInfo(numberThis) {
    console.log(1);
    var enterPop = document.getElementsByClassName("pop-full-screen-info");
    enterPop[0].classList.remove("d-none");
    enterPop[0].classList.add("d-block");
    enterPop[0].style.height = document.documentElement.scrollHeight + "px";
}
function hideInfo(numberThis) {
    var enterPop = document.getElementsByClassName("pop-full-screen-info");
    enterPop[0].classList.remove("d-block");
    enterPop[0].classList.add("d-none");
}
var buttonRegCode1 = document.getElementsByClassName(
    "content-object-card-information-button-details"
); // показать Подробнее
var buttonCloseRegCode = document.getElementsByClassName(
    "pop-full-screen-close-info"
); // Убрать Подробнее
if (buttonRegCode1.length) {
    buttonRegCode1[0].addEventListener(
        "click",
        function() {
            showInfo(this);
        },
        false
    );
}
if (buttonCloseRegCode.length) {
    buttonCloseRegCode[0].addEventListener(
        "click",
        function() {
            hideInfo(this);
        },
        false
    );
    // buttonCloseRegCode[1].addEventListener( "click" , function(){hideInfo(this)}, false);
}
