<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
<<<<<<< HEAD
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
=======

$router->get('/', function () use ($router) {
    return view('index');
>>>>>>> 89769b095d0b37866a06a83ec8dbad3abeb80216
});
// $router->get('/home', 'SpaController@index');
