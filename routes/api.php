<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('createProduct', 'ProductController@create');
Route::post('productList', 'ProductController@allProduct');
Route::post('getProductByCatid', 'ProductController@getProductByCatid');
Route::post('getProductByPid', 'ProductController@getProductByPid');
Route::post('updateProduct', 'ProductController@updateProduct');
Route::post('deleteProduct', 'ProductController@deleteProduct');

Route::post('createCategory', 'CategoryController@create');
Route::post('categoryList', 'CategoryController@getCategory');
Route::post('updateCategory', 'CategoryController@updateCategory');
Route::post('deleteCategory', 'CategoryController@deleteCategory');
