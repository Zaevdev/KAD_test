<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/currencies', 'CurrencyController@index');
$router->get('/currencies/{id}', 'CurrencyController@show');
$router->post('/currencies/store', 'CurrencyController@store');
$router->put('/currencies/update/{id}', 'CurrencyController@update');
$router->delete('/currencies/delete/{id}', 'CurrencyController@destroy');
$router->get('/', function () use ($router) {
    return $router->app->version();
});
