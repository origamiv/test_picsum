<?php

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

//Route::get('/','\App\Http\Controllers\AdminController@index')->name('admin');
//Route::get('/','\App\Http\Controllers\PhotoController@index')->name('index');

Route::get('/', function (\Symfony\Component\HttpFoundation\Request $request) {
    $params = $request->all();
    $count = count($params);
    if (!empty($params['token']) && ($params['token'] == 'xyz123')) {
        $controller = new \App\Http\Controllers\AdminController();
        return $controller->index($request);
    } elseif ($count == 0) {
        $controller = new \App\Http\Controllers\PhotoController();
        return $controller->index();
    }
})->name('index');

Route::post('/photo/{photo}', '\App\Http\Controllers\PhotoController@update')->name('update');
