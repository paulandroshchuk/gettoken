<?php

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

$router->middleware('auth:api')->group(function ($router) {
    $router->post('/gateways/{tokenGateway}/tokens', 'Tokens\TokensController@store');
});
