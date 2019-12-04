<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
$router->group(['middleware'=>'cors','as'=>'auth.'], function () use ($router) {
    $router->get('/register', 'AuthController@register');
    $router->get('/login', 'AuthController@login');
});

$router->group(['middleware'=>'cors','as'=>'home.'], function () use ($router) {
    $router->get('/', 'HomeController@index');
});
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
$router->group(['middleware'=>'cors','prefix' => '/admin/','middleware'=>'auth','as'=>'admin.'], function () use ($router) {
    $router->get('/', 'HomeController@index');

});
/*
|--------------------------------------------------------------------------
| Article And Category Routes
|--------------------------------------------------------------------------
*/
$router->group(['middleware'=>'cors','prefix' => '/categories/','as'=>'articles.'], function () use ($router) {
    $router->get('', 'ArticleAndCategoryController@index');
    $router->get('{id}/AllSubCategoriesList', 'ArticleAndCategoryController@AllSubCategoriesList');
    $router->get('AllSubCategoryList','ArticleAndCategoryController@AllSubCategoryList');
});
$router->group(['middleware'=>'cors','prefix' => '/admin/articles/','as'=>'admin.articles.'], function () use ($router) {
    $router->post('ArticleStore', 'ArticleAndCategoryController@ArticleStore');
    $router->get('{id}/ArticleEdit', 'ArticleAndCategoryController@ArticleEdit');
    $router->post('{id}/ArticleUpdate', 'ArticleAndCategoryController@ArticleUpdate');

});
/*
|--------------------------------------------------------------------------
| User Panel Routes
|--------------------------------------------------------------------------
*/
<<<<<<< HEAD
$router->get('/', ['middleware' => 'cors', function () {
    return view('index');
}]);
=======
$router->get('/', function () use ($router) {
    return view('app');
});
$router->get('/admin', function () use ($router) {
    return view('admin');
});
>>>>>>> 051cb4d02bc5d33adf79e0b66c89d6cd3b447517

