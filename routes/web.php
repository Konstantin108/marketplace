<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\ParserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublishedGoodController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

//Роуты для авторизованных пользователей
Route::group(['middleware' => 'auth'], function () {

//Роуты для админов
    Route::group(['middleware' => 'admin'], function () {

        //Роуты для работы с тасками
        Route::get('/create', [TaskController::class, 'create'])
            ->name('create');

        Route::get('/myTasks', AccountController::class);

        Route::get('/myTasks/{userId}', AccountController::class)
            ->where('userId', '\d+')
            ->name('myTasks');

        Route::get('/index/{filter}', [TaskController::class, 'index'])
            ->where('filter', '\d+')
            ->name('index');

        Route::get('/filterTasks/{filter}', [TaskController::class, 'filterTasks'])
            ->where('filter', '\d+')
            ->name('filterTasks');

        Route::post('/store', [TaskController::class, 'store'])
            ->name('store');

        Route::get('show/{id}/{link}/{filter}', [TaskController::class, 'show'])
            ->where('id', '\d+')
            ->where('link', '\d+')
            ->where('filter', '\d+')
            ->name('show');

        Route::get('back/{link}/{filter}', [TaskController::class, 'back'])
            ->where('link', '\d+')
            ->where('filter', '\d+')
            ->name('back');

        Route::get('deleteTask/{id}/{link}/{filter}', [TaskController::class, 'deleteTask'])
            ->where('id', '\d+')
            ->where('link', '\d+')
            ->where('filter', '\d+')
            ->name('deleteTask');

        Route::put('taskEdit/{id}/{link}/{filter}', [TaskController::class, 'taskEdit'])
            ->where('id', '\d+')
            ->where('link', '\d+')
            ->where('filter', '\d+')
            ->name('taskEdit');

        Route::get('destroy/{id}/{link}/{filter}', [TaskController::class, 'destroy'])
            ->where('id', '\d+')
            ->where('link', '\d+')
            ->where('filter', '\d+')
            ->name('destroy');

        //Роуты парсинга
        Route::get('/parsing', ParserController::class)
            ->name('parsing');;

        //Роуты для товаров
        Route::get('goods', [GoodController::class, 'index'])
            ->name('goods');

        Route::get('showGood/{id}', [GoodController::class, 'showGood'])
            ->where('id', '\d+')
            ->name('showGood');

        Route::get('deleteGood/{id}', [GoodController::class, 'deleteGood'])
            ->where('id', '\d+')
            ->name('deleteGood');

        Route::get('edit/{id}', [GoodController::class, 'edit'])
            ->where('id', '\d+')
            ->name('edit');

        Route::get(uri: 'goods/createGood', action: [GoodController::class, 'createGood'])
            ->name('createGood');

        Route::post('/storeGood', [GoodController::class, 'storeGood'])
            ->name('storeGood');

        Route::post('update/{id}', [GoodController::class, 'update'])
            ->where('id', '\d+')
            ->name('update');

        //Роуты для опубликованных товаров
        Route::get('publishedGoods', [GoodController::class, 'publishedGoods'])
            ->name('publishedGoods');

        Route::get('showPublishedGoods', [GoodController::class, 'showPublishedGoods'])
            ->name('showPublishedGoods');

        Route::get('oneGood/{id}', [PublishedGoodController::class, 'oneGood'])
            ->where('id', '\d+')
            ->name('oneGood');

        //Роуты для работы с пользователями
        Route::get('users', [UserController::class, 'users'])
            ->name('users');

        Route::get('user/{id}', [UserController::class, 'user'])
            ->where('id', '\d+')
            ->name('user');

        Route::get('deleteUser/{id}', [UserController::class, 'deleteUser'])
            ->where('id', '\d+')
            ->name('deleteUser');

        Route::get('editUser/{id}', [UserController::class, 'editUser'])
            ->where('id', '\d+')
            ->name('editUser');

        Route::get('createUser', [UserController::class, 'createUser'])
            ->name('createUser');

        Route::post('updateUser/{id}', [UserController::class, 'updateUser'])
            ->where('id', '\d+')
            ->name('updateUser');

        Route::post('storeUser', [UserController::class, 'storeUser'])
            ->name('storeUser');
    });

//Роуты для авторизованных посетителей
    //Для работы с профилем
    Route::get('myProfile', [ProfileController::class, 'myProfile'])
        ->name('myProfile');

    Route::get('editProfile', [ProfileController::class, 'editProfile'])
        ->name('editProfile');

    Route::post('updateProfile', [ProfileController::class, 'updateProfile'])
        ->name('updateProfile');

    //Для работы с товарами и корзиной
    Route::get('addToBasket/{id}/{tableId}{link}', [BasketController::class, 'addToBasket'])
        ->where('id', '\d+')
        ->where('tableId', '\d+')
        ->where('link', '\d+')
        ->name('addToBasket');

    Route::get('delFromBasket/{id}/{tableId}{link}', [BasketController::class, 'delFromBasket'])
        ->where('id', '\d+')
        ->where('tableId', '\d+')
        ->where('link', '\d+')
        ->name('delFromBasket');

    Route::get('myBasket', [BasketController::class, 'myBasket'])
        ->name('myBasket');
});

//Роуты для неавторизованных посетителей
Route::get('/', [PublishedGoodController::class, 'siteIndex'])
    ->name('siteIndex');

Route::get('siteOneGood/{id}/{tableId}/{link}', [PublishedGoodController::class, 'siteOneGood'])
    ->where('id', '\d+')
    ->where('tableId', '\d+')
    ->where('link', '\d+')
    ->name('siteOneGood');

Route::get('backForSite/{link}', [BasketController::class, 'backForSite'])
    ->where('link', '\d+')
    ->name('backForSite');

//Роуты для работы с сессией для удобства пока в контроллере BasketController
Route::get('showSession', [BasketController::class, 'showSession'])
    ->name('showSession');

Route::get('clearSession', [BasketController::class, 'clearSession'])
    ->name('clearSession');

Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])
//    ->name('home');
