<?php

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

$router->get('/', function () {
    dd(app()->cache->get('name'));
    die();
    return view('home.index');
});

$router->group(['prefix' => '/api'], function () use ($router) {
    $router->get('/news/{service}', 'Api\NewsController@index');
});
