<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
$router->group(['as'=>'auth.'], function () use ($router) {
    $router->get('/register', 'AuthController@register');
    $router->get('/login', 'AuthController@login');
});
/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
*/
$router->group(['as'=>'home.'], function () use ($router) {
    $router->get('/', 'HomeController@index');
});
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
$router->group(['prefix' => '/admin/','middleware'=>'auth','as'=>'admin.'], function () use ($router) {
    $router->get('/', 'HomeController@index');
});
