<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
$router->group(['middleware'=>['cors'],'as'=>'auth.'], function () use ($router) {
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');
    $router->get('/token','AuthController@token');
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
    $router->get('','ArticleAndCategoryController@showAllArticles');
});
/*
|--------------------------------------------------------------------------
| Forex
|--------------------------------------------------------------------------
*/
$router->group(['middleware'=>'cors','prefix' => '/forex/','as'=>'forex.'], function () use ($router) {
    $router->get('','ForexController@index');
    $router->get('AllForex','ForexController@AllForex');
    $router->get('forexCategories', 'ForexController@forexCategories');
    $router->post('forexStore', 'ForexController@forexStore');
    $router->get('forexEdit/{id}', 'ForexController@forexEdit');
    $router->post('forexUpdate/{id}', 'ForexController@forexUpdate');
    $router->get('forexExpire/{id}', 'ForexController@forexExpire');
    $router->get('forexClose/{id}', 'ForexController@forexClose');
    $router->get('forexDelete/{id}', 'ForexController@forexDelete');
    $router->get('forexEvent','ForexController@forexEvent');
    $router->get('close-expire-list','ForexController@close_expire_list');
});
/*
|--------------------------------------------------------------------------
| Binary Option
|--------------------------------------------------------------------------
*/
$router->group(['middleware'=>'cors','prefix' => '/binaries/','as'=>'binaries.'], function () use ($router) {
    $router->get('', 'BinaryController@index');
    $router->post('store', 'BinaryController@store');
    $router->get('edit/{id}', 'BinaryController@edit');
    $router->post('update/{id}', 'BinaryController@update');
    $router->get('delete/{id}', 'BinaryController@delete');
    $router->get('close/{id}', 'BinaryController@close');
    $router->get('closeBinaries', 'BinaryController@closeBinaries');

});
/*
|--------------------------------------------------------------------------
| Currency Routes
|--------------------------------------------------------------------------
*/
$router->group(['middleware'=>'cors','prefix' => '/currency/','as'=>'currency.'], function () use ($router) {
    $router->get('', 'CurrencyController@index');
    $router->post('store/{id}', 'CurrencyController@store');
    $router->get('edit/{id}', 'CurrencyController@edit');
    $router->post('update/{id}', 'CurrencyController@update');
    $router->get('destroy/{id}', 'CurrencyController@destroy');
});
/*
|--------------------------------------------------------------------------
| Plan Routes
|--------------------------------------------------------------------------
*/
$router->group(['middleware'=>'cors','prefix' => '/plans/','as'=>'plans.'], function () use ($router) {
    $router->get('', 'PlanController@index');
    $router->get('PlanStore', 'PlanController@PlanStore');
    $router->get('PlanEdit/{id}', 'PlanController@PlanEdit');
    $router->get('PlanUpdate/{id}', 'PlanController@PlanUpdate');
    $router->get('PlanDelete/{id}', 'PlanController@PlanDelete');
    $router->get('StorePlanForUser', 'PlanController@StorePlanForUser');
    $router->get('AllUserPlan/{user_id}', 'PlanController@StorePlanForUser');



});
/*
|--------------------------------------------------------------------------
| User Panel Routes
|--------------------------------------------------------------------------
*/
$router->get('/', ['middleware' => ['cors'], function () {
    return view('app');
}]);
$router->get('/admin', ['middleware' => ['cors'], function () {
   
    return view('admin');
}]);

