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

$router->middleware('auth')->group(function ($router) {
    // Dashboard
    $router->get('/', 'Dashboard\DashboardController@index')->name('dashboard.index');

    // Gateways
    $router->get('/gateways', 'Gateways\GatewaysController@index')->name('gateways.index');
    $router->view('/gateways/sms/create', 'gateways.sms.create')->name('gateways.sms.create');
    $router->post('/gateways', 'Gateways\GatewaysController@store')->name('gateways.store');
    $router->delete('/gateways/{gateway}', 'Gateways\GatewaysController@destroy')->name('gateways.destroy');

    // Webhooks
//    $router->get('/webhooks', 'Webhooks\WebhooksController@index')->name('webhooks.index');

    // API
    $router->get('/api', 'Api\ApiController@index')->name('api.index');

    // Settings
    $router->get('/settings', 'Settings\SettingsController@index')->name('settings.index');
});
