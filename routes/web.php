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

Auth::routes();

$router->view('/welcome', 'index.index');

$router->namespace('Dashboard')->group(function ($router) {
    $router->middleware('auth')->group(function ($router) {
        $router->get('/', 'DashboardController@index')->name('dashboard.index');
    });
});
