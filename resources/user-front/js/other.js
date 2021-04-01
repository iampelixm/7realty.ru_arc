var myModal;
$("button.button_link").click(function () {
    let href = this.getAttribute("href");
    openLink(href);
});
function openLink(href) {
    if (href != null) document.location = href;
}
function createMyModalLink(element) {
    let title = element.getAttribute("data-title");
    let body = element.getAttribute("data-body");
    let href = element.getAttribute("href");
    let actionYes = "";
    if (title == null) title = "";
    if (body == null) body = "";
    if (href != null)
        actionYes = function () {
            openLink(href);
        };
    createMyModalYesNo(title, body, actionYes);
}

function createMyModalYesNo(title, body, actionYes) {
    let data = {
        title: title,
        body: body,
        btns: [
            { name: "Да", class: "btn btn-success btn-sm", onclick: actionYes },
            {
                name: "Нет",
                class: "btn btn-danger btn-sm",
                onclick: function () {
                    closeMyModal();
                }
            }
        ]
    };
    return createMyModal(data);
}
function closeMyModal() {
    myModal.remove();
}
function createMyModal(data) {
    /*
    title - заголовок
    body - описание
    btns -кнопки
    btns [
        name - название
        class - класс кнопки
        onclick - событие js
    ]
    */
    //let divModal = document.createElement('div');
    myModal = document.createElement("div");
    myModal.classList.add("myModal");
    let divModal = getBackGround();
    let modalWin = getModal();
    modalWin.appendChild(getModalTitle(data.title));
    modalWin.appendChild(getModalBody(data.body));
    modalWin.appendChild(getModalBtns(data.btns));
    modalWin.classList.add("modalWin");
    divModal.appendChild(modalWin);
    myModal.appendChild(divModal);
    document.body.appendChild(myModal);
    return myModal;

    function getModalBtns(btns) {
        let block = document.createElement("div");
        block.classList.add("btns");
        for (let i = 0; i < btns.length; i++)
            block.appendChild(getBtn(btns[i]));
        return block;

        function getBtn(btn) {
            let button = document.createElement("button");
            button.textContent = btn.name;
            let btnClass = btn.class.split(" ");
            for (let i = 0; i < btnClass.length; i++)
                button.classList.add(btnClass[i]);
            if (typeof btn.onclick == "string")
                button.onclick = function () {
                    eval(btn.onclick);
                };
            else button.onclick = btn.onclick;
            return button;
        }
    }
    function getModalBody(body) {
        let block = document.createElement("div");
        block.classList.add("body");
        block.innerHTML = body;
        return block;
    }
    function getModalTitle(title) {
        let block = document.createElement("div");
        block.classList.add("title");
        block.innerHTML = title;
        return block;
    }
    function getModal(modal = document.createElement("div")) {
        let heightModal = 150;
        let widthModal = 300;
        modal.style.height = heightModal + "px";
        modal.style.width = widthModal + "px";
        modal.style.top = "calc( 30% - " + heightModal / 2 + "px )";
        modal.style.left = "calc( 50% - " + widthModal / 2 + "px )";
        return modal;
    }

    function getBackGround(backGround = document.createElement("div")) {
        backGround.classList.add("background");
        backGround.style.minHeight =
            document.documentElement.clientHeight + "px";
        backGround.style.minWidth = document.documentElement.clientWidth + "px";
        return backGround;
    }
}
let btnMap = document.getElementById("switch-map");
let map = document.getElementById("map");
let cards = document.getElementById("cards");

if (btnMap) {
    btnMap.addEventListener("click", function () {
        map.classList.toggle("active");
        cards.classList.toggle("active");
    });

    function onClickBtnSwitchMap(e) {
        let map = document.querySelector("#cardContainer #map");

        let btn = e.target;
        let cardWrapper = document.querySelector("#cardContainer");
        const iconMap = '<i class="fas fa-map-marker-alt"></i>';
        if (map.classList.value.indexOf("active") !== -1) {
            cardWrapper.classList.add("cardContainer_closeMap");
            btn.innerHTML = "Показать карту " + iconMap;
        } else {
            cardWrapper.classList.remove("cardContainer_closeMap");
            btn.innerHTML = "Скрыть карту " + iconMap;
        }
        $(".slide-image-div").slick("refresh");
    }
    let btnToggler = document.querySelector("#switch-map");
    btnToggler.addEventListener("click", onClickBtnSwitchMap);
    document.querySelectorAll("img").forEach(el => {
        if (!el.src && "src" in el.dataset !== -1) el.src = el.dataset.src;
    });
}

$.fn.textToggle = function (text1, text2) {
    if ($(this).text().trim == text1) {
        $(this).text(text2)
    }
    else if ($(this).text().trim == text2) {
        $(this).text(text1)
    }
    else {
        $(this).text(text1)
    }
}
