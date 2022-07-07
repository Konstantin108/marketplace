<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\ParserController;
use App\Http\Controllers\PublishedGoodController;
use App\Http\Controllers\TaskController;
use \App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'auth'], function () {

    //Методы для работы с тасками и пользователями

    Route::get('/', AccountController::class)
        ->name('myTasks');

    Route::get('/myTasks/{userId}', AccountController::class)
        ->where('userId', '\d+')
        ->name('myTasks');

    Route::get('/index/{filter}', [TaskController::class, 'index'])
        ->where('filter', '\d+')
        ->name('index');

    Route::get('/filterTasks/{filter}', [TaskController::class, 'filterTasks'])
        ->where('filter', '\d+')
        ->name('filterTasks');

    Route::get('/create', [TaskController::class, 'create'])
        ->name('create');

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

    Route::get('delete/{id}/{link}/{filter}', [TaskController::class, 'delete'])
        ->where('id', '\d+')
        ->where('link', '\d+')
        ->where('filter', '\d+')
        ->name('delete');

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

    //Методы парсинга

    Route::get('/parsing', ParserController::class)
        ->name('parsing');;

    Route::get('parserIndex', [GoodController::class, 'parserIndex'])
        ->name('parserIndex');

    //Методы для товаров

    Route::get('goods', [GoodController::class, 'index'])
        ->name('goods');

    Route::get('showGood/{id}', [GoodController::class, 'showGood'])
        ->where('id', '\d+')
        ->name('showGood');

    Route::get('showGood/delete/{id}', [GoodController::class, 'delete'])
        ->where('id', '\d+')
        ->name('delete');

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

    //Методы для опубликованных товаров

    Route::get('publishedGoods', [GoodController::class, 'publishedGoods'])
        ->name('publishedGoods');

    Route::get('showPublishedGoods', [GoodController::class, 'showPublishedGoods'])
        ->name('showPublishedGoods');

    Route::get('oneGood/{id}', [PublishedGoodController::class, 'oneGood'])
        ->where('id', '\d+')
        ->name('oneGood');

    //Методы для пользователей

    Route::get('users', [UserController::class, 'users'])
        ->name('users');

});

Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])
//    ->name('home');
