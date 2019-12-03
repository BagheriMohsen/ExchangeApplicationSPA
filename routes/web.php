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
/*
|--------------------------------------------------------------------------
| Article And Category Routes
|--------------------------------------------------------------------------
*/
$router->group(['prefix' => '/categories/','as'=>'articles.'], function () use ($router) {
    $router->get('', 'ArticleAndCategoryController@index');
    $router->get('{id}/AllSubCategoriesList', 'ArticleAndCategoryController@AllSubCategoriesList');
    $router->get('AllSubCategoryList','ArticleAndCategoryController@AllSubCategoryList');
});
$router->group(['prefix' => '/admin/articles/','as'=>'admin.articles.'], function () use ($router) {
    $router->post('ArticleStore', 'ArticleAndCategoryController@ArticleStore');
    $router->get('{id}/ArticleEdit', 'ArticleAndCategoryController@ArticleEdit');
    $router->post('{id}/ArticleUpdate', 'ArticleAndCategoryController@ArticleUpdate');

});
/*
|--------------------------------------------------------------------------
| User Panel Routes
|--------------------------------------------------------------------------
*/
$router->get('/', function () use ($router) {
    return view('app');
});
$router->get('/admin', function () use ($router) {
    return view('admin');
});

