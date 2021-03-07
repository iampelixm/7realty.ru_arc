<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Авторизация - после запуска убрать регистрацию
Auth::routes([
    'register' => true,
    'verify' => false,
    'reset' => false
]);

Route::get('/', 'MainController@index')->middleware('city')->name('home');


//Роуты отдельных страниц отдельного дизайна
Route::get('/about', function () {
    return view('pages.standalone.about');
});

Route::get('/work', function () {
    return view('pages.standalone.work');
});

// Роуты публичной части сайта
Route::prefix('/')->namespace('Site')->name('site.')->middleware('city')->group(function () {
    Route::get('/change/city/{city}', 'CityController@changeCity')->name('change_city');
    Route::get('/category/{category:slug}', 'CategoryController@list')->name('get_category');
    Route::get('/special/category/{category:slug}', 'CategoryController@listSpecial')->name('get_category_special');
    Route::get('/types/{type:slug}', 'TypeController@list')->name('get_type');

    Route::prefix('/item/{item:slug}')->name('item.')->group(function () {
        Route::get('/', 'ItemController@item')->name('get');
        Route::get('/pdf/download', 'ItemController@downloadPdf')->name('getPdf');
    });

    Route::post('/order/send', 'OrderController@sendOrderMail')->name('send_order');
    Route::post('/order/bay/send', 'OrderController@sendOrderShowMailBuy')->name('send_order_buy');
    Route::post('/order/orenda/send', 'OrderController@sendOrderShowMailOrenda')->name('send_order_orenda');
    Route::post('/order/show', 'OrderController@sendOrderShowMail')->name('send_order_show');
    Route::post('/send/sms', 'UserController@sendSms')->name('send_sms');
    Route::post('/virification/code', 'UserController@verificationCode')->name('verification_code');
    Route::post('/register', 'UserController@register')->name('register');
    Route::post('/setfavorites', 'UserController@setfavorites')->name('set_favorites');

    Route::get('/contacts', 'PageController@contacts')->name('contacts');
    Route::get('/favorites', 'UserController@favorites')->name('favorites');

    Route::get('/company/{page:slug}', 'PageController@page')->name('get_page');
    Route::get('/service/{page:slug}', 'PageController@page')->name('get_service');

    Route::get('/company', 'PageController@company')->name('company');
    Route::get('/aboutus', 'PageController@aboutus')->name('aboutus');
    Route::get('/clients', 'PageController@clients')->name('clients');
    Route::get('/team', 'PageController@team')->name('team');

    Route::get('/service/agency', 'PageController@agency')->name('agency');
    Route::get('/service/analitics', 'PageController@analitics')->name('analitics');
    Route::get('/service/managment', 'PageController@managment')->name('managment');
    Route::get('/service/support', 'PageController@support')->name('support');

    Route::get('/apartments/{type}', 'ItemController@apartments')->name('apartments');
    Route::get('/apartments/react/{type}', 'ItemController@apartmentsReact')->name('apartments_react');
    Route::prefix('/residences/{type}')->name('res.')->group(function () {
        Route::get('/', 'ResidenceController@residences')->name('residences');
        //Route::get('/items/','ResidenceController@residenceItem')->name('residences_items');
    });

    Route::get('/residences/{residence}/items', 'ResidenceController@residenceItem')->name('residences_items');
});

// Роуты новой админки
Route::prefix('/admin')->namespace('Admin')->middleware('auth', 'check.admin')->name('admin.')->group(function () {
    // Главная
    Route::get('/', 'MainController@index')->name('index');
    // Типы обьектов
    Route::resource('type', 'TypesController');
    // Обьекты
    Route::resource('items', 'ItemsController');

    // Жк комплекс
    Route::resource('residences', 'ResidenceController');

    // Категории
    Route::resource('categories', 'CategoryController');

    // Категории ЖК
    Route::resource('rescategories', 'ResCategoryController');

    // Опции обьектов
    Route::resource('options', 'OptionController');

    // Райони
    Route::resource('areas', 'AreaController');

    // Райони
    Route::resource('pages', 'PageController');

    // Коментарии
    Route::prefix('/comments/{type}')->name('comments.')->group(function () {
        Route::get('/{id}', 'CommetController@index')->name('list');
        Route::get('/{id}/create', 'CommetController@create')->name('create');
        Route::post('/{id}/post', 'CommetController@store')->name('store');
        Route::get('/{id}/edit/{comment}', 'CommetController@edit')->name('edit');
        Route::post('/{id}/update/{comment}', 'CommetController@update')->name('update');
        Route::get('/{id}/delte/{comment}', 'CommetController@destroy')->name('delete');
    });

    Route::prefix('categories/{category}')->name('category.')->group(function () {
        Route::get('/items', 'CategoryController@items')->name('items');
        Route::post('/uploadimage', 'CategoryController@updateImage')->name('uploadimage');
    });

    Route::get('areas/{area}/items', 'AreaController@items')->name('areas.items');
    Route::get('types/{type}/items', 'TypesController@items')->name('types.items');

    //Отображение обьектов в ЖК
    Route::get('/residences/{residence}/items', 'ResidenceController@itemList')->name('residences.items.list');

    //спецпредложение обьектов
    Route::get('/special/offers/items', 'ItemsController@offerList')->name('items.offers.list');

    //спецпредложение категорий
    Route::get('/special/offers/category', 'CategoryController@offerList')->name('category.offers.list');

    //Управление изображениями
    Route::prefix('/items/{item}/images')->name('items.images.')->group(function () {
        Route::get('/', 'ImageController@index')->name('list');
        Route::post('/add', 'ImageController@add')->name('add');
        Route::post('/setorder', 'ImageController@setOrder')->name('set_order');
        Route::delete('/delete/{image}', 'ImageController@delete')->name('delete');
        Route::get('/edit/status/{image}', 'ImageController@editStatus')->name('edit_status');
        Route::get('/up/{image}', 'ImageController@orderUp')->name('up');
        Route::get('/down/{image}', 'ImageController@orderDown')->name('down');
    });

    //Управление изображениями
    Route::prefix('/residences/{item}/images')->name('residences.images.')->group(function () {
        Route::get('/', 'ImageResidenceController@index')->name('list');
        Route::post('/add', 'ImageResidenceController@add')->name('add');
        Route::delete('/delete/{image}', 'ImageResidenceController@delete')->name('delete');
        Route::get('/edit/status/{image}', 'ImageResidenceController@editStatus')->name('edit_status');
        Route::get('/up/{image}', 'ImageResidenceController@orderUp')->name('up');
        Route::get('/down/{image}', 'ImageResidenceController@orderDown')->name('down');
    });

    // Управление пользователями
    Route::prefix('/settings/users')->name('settings.users.')->group(function () {
        Route::get('/', 'UserController@list')->name('list');
        Route::get('/new', 'UserController@new')->name('new');
        Route::post('/new', 'UserController@post_new')->name('post_new');
        Route::get('/edit/{id}/{lang?}', 'UserController@edit')->name('edit');
        Route::post('/edit/{id}/{lang?}', 'UserController@post_edit')->name('post_edit');
        Route::delete('/delete/{id}/{lang?}', 'UserController@post_delete')->name('post_delete');

        Route::get('/roles', 'UserController@roles')->name('roles');
    });

    // Управление клиентами
    Route::prefix('/settings/clients')->name('settings.clients.')->group(function () {
        Route::get('/', 'ClientController@list')->name('list');
        Route::get('/new', 'ClientController@new')->name('new');
        Route::post('/new', 'ClientController@post_new')->name('post_new');
        Route::get('/edit/{id}/{lang?}', 'ClientController@edit')->name('edit');
        Route::post('/edit/{id}/{lang?}', 'ClientController@post_edit')->name('post_edit');
        Route::delete('/delete/{id}/{lang?}', 'ClientController@post_delete')->name('post_delete');

        Route::get('/roles', 'UserController@roles')->name('roles');
    });

    // API
    Route::prefix('/api')->name('api.')->group(function () {
        Route::post('/item/edit/status/{item}', 'ItemsController@editStatus')->name('item.edit_status');
        Route::post('/page/edit/status/{page}', 'PageController@editStatus')->name('page.edit_status');
        Route::post('/item/edit/offer/{item}', 'ItemsController@editOffer')->name('item.edit_offer');
        Route::post('/area/edit/status/{area}', 'AreaController@editStatus')->name('area.edit_status');
        Route::post('/comment/edit/status/{comment}', 'CommetController@editStatus')->name('comment.edit_status');
        Route::post('/option/edit/status/{option}', 'OptionController@editStatus')->name('option.edit_status');
        Route::post('/option/edit/require/{option}', 'OptionController@editRequire')->name('option.edit_require');
        Route::post('/residence/edit/status/{residence}', 'ResidenceController@editStatus')->name('residence.edit_status');
        Route::post('/type/edit/status/{type}', 'TypesController@editStatus')->name('type.edit_status');
        Route::post('/category/edit/status/{category}', 'CategoryController@editStatus')->name('category.edit_status');
        Route::post('/rescategory/edit/status/{rescategory}', 'ResCategoryController@editStatus')->name('rescategories.edit_status');
        Route::post('/category/edit/show/{category}', 'CategoryController@editShowMain')->name('category.edit_show');
        Route::post('/category/edit/menu/{category}', 'CategoryController@editShowMenu')->name('category.edit_menu');
        Route::post('/category/edit/offer/{category}', 'CategoryController@editOffer')->name('category.edit_offer');
    });
});

// Роуты новой админки
Route::prefix('/api')->middleware('auth')->name('api.')->group(function () {
    Route::get('/get/options', 'Admin\OptionController@apiGetOption')->name('getoption');
    Route::get('/get/options/type', 'Admin\OptionController@apiGetOptionType')->name('getoption_for_type');
    Route::get('/get/category', 'Admin\CategoryController@apiGetCategory')->name('getcategory');
    Route::get('/get/address', 'Admin\GoogleMapsController@getCoordinateByAdress')->name('getadress');
    Route::post('/get/options/value', 'Admin\OptionController@apiGetOptionValue')->name('valuebyoption');
});
