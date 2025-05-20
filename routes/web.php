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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/product', 'ProductController@index');
$router->get('/product/{id}', 'ProductController@show');
$router->post('/product', 'ProductController@create');
$router->put('/product/{id}', 'ProductController@update');
$router->delete('/product/{id}', 'ProductController@delete');

$router->post('auth/login', 'AuthController@login');
$router->post('auth/logout', 'AuthController@logout');
$router->post('auth/refresh', 'AuthController@refresh');
$router->post('auth/info', 'AuthController@user_info');

$router->get('/test', function () {
    return 'GET route';
});

$router->post('/test', function () {
    return 'POST route';
});

$router->put('/test', function () {
    return 'PUT route';
});

$router->delete('/test', function () {
    return 'DELETE route';
});
