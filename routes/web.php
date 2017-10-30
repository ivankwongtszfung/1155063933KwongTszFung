<?php

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
Route::get('product', function () {
    return view('product');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/index/{Catid}', function () {
    return view('welcome');
});

Route::get('/adminPanel', function () {
    return view('adminPanel');
});
Route::get('/adminPanel/editProduct', function () {
    return view('editProduct');
});
Route::get('/adminPanel/createProduct', function () {
    return view('createProduct');
});
Route::get('foo', function () {
    return 'Hello World';
});