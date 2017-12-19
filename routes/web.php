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

Route::middleware(['auth', 'admin'])->group(function () {
	Route::get('/adminPanel', function () {
	    return view('adminPanel');
	});
	Route::get('/adminPanel/editProduct', function () {
	    return view('editProduct');
	});
	Route::get('/adminPanel/createProduct', function () {
	    return view('createProduct');
	});
});


Route::get('product', function () {
    return view('product');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/images/{filename}', function ($filename)
{
    $path = storage_path() . '/app/images/' . $filename;

    if(!File::exists($path) && substr($filename, -3)!="png") $path .= ".png";

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('avatar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
