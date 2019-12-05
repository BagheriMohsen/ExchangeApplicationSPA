<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
$router->group(['middleware'=>['cors'],'as'=>'auth.'], function () use ($router) {
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
    $router->get('ArticleSingle/{id}','ArticleAndCategoryController@ArticleSingle');
});
$router->group(['middleware'=>'cors','prefix' => '/admin/articles/','as'=>'admin.articles.'], function () use ($router) {
    $router->post('ArticleStore', 'ArticleAndCategoryController@ArticleStore');
    $router->get('{id}/ArticleEdit', 'ArticleAndCategoryController@ArticleEdit');
    $router->post('{id}/ArticleUpdate', 'ArticleAndCategoryController@ArticleUpdate');
    $router->get('ArticleDelete/{id}','ArticleAndCategoryController@ArticleDelete');
});
/*
|--------------------------------------------------------------------------
| Article And Category Routes
|--------------------------------------------------------------------------
*/
$router->group(['middleware'=>'cors','prefix' => '/forex/','as'=>'forex.'], function () use ($router) {
    $router->get('forexCategories', 'ForexController@forexCategories');
    $router->post('forexStore', 'ForexController@forexCategoforexStoreries');
    $router->get('forexEdit/{id}', 'ForexController@forexEdit');
    $router->post('forexUpdate/{id}', 'ForexController@forexUpdate');
    $router->get('forexExpire', 'ForexController@forexExpire');
    $router->get('forexClose', 'ForexController@forexClose');
    $router->get('forexDelete/{id}', 'ForexController@forexDelete');
});
/*
|--------------------------------------------------------------------------
| User Panel Routes
|--------------------------------------------------------------------------
*/
$router->get('/', ['middleware' => 'cors', function () {
    return view('app');
}]);
$router->get('/admin', ['middleware' => 'cors', function () {
    return view('admin');
}]);

