switchElement = function (elementsContainer, buttonsContainer, showElement, toggleClass='active')
{
    var event;
    if (!event) event = window.event;
    $(elementsContainer).children().each(function(eli, el)
    {
        $(el).removeClass(toggleClass);
    });
    $(buttonsContainer).children().each(function(eli, el)
    {
        $(el).removeClass(toggleClass);
    });

    $(showElement).addClass(toggleClass);
    $(event.target).addClass(toggleClass);
}

getElementHeight=function(element)
{
    return $(element).position().top + $(element).outerHeight(true);
}

setAppHeight = function(new_height)
{
    $('.app').css('height', new_height);
    if(new_height !== 'auto')
    $('.app').css('overflow-y', 'hidden');
}

showHideMenu = function(element)
{
    if($(element).height() == 0)
    {
        $(element).css('height', 'auto');
        $('.main-content').hide();
    }
    else
    {
        $('.main-content').show();
        $(element).css('height', 0);
    }
}
