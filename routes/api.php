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

$router->namespace('Organizations')->group(function ($router) {
    $router->middleware('auth:api')->group(function ($router) {
        $router->get('/organizations', 'OrganizationsController@index');
        $router->post('/organizations', 'OrganizationsController@store');
    });
});
