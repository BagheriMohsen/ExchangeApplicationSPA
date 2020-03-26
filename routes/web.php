<?php

session_start();
/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
$router->group(['middleware'=>['cors'],'as'=>'auth.'], function () use ($router) {
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');
    $router->get('sendVerfySms','AuthController@sendVerfySms');
    $router->get('/token','AuthController@token');
    $router->get('/logout/{user_id}','AuthController@logout');
    $router->get('/user-guide-check/{user_id}','AuthController@user_guide_check');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin-login',function(){
   return view('admin_auth.login');
});
Route::get('/admin-logout',function(){
    session_destroy();
    return redirect('/admin-login');
 });
Route::post('/login_admin','AuthController@admin_login');
/*
|--------------------------------------------------------------------------
| Article And Category Routes
|--------------------------------------------------------------------------
*/
$router->group(['middleware'=>'cors','prefix' => '/categories/','as'=>'articles.'], function () use ($router) {
    $router->get('', 'ArticleAndCategoryController@index');
    $router->get('{id}/AllSubCategoriesList/{user_id}', 'ArticleAndCategoryController@AllSubCategoriesList');
    $router->get('AllSubCategoryList','ArticleAndCategoryController@AllSubCategoryList');
    $router->get('ArticleSingle/{id}','ArticleAndCategoryController@ArticleSingle');
    $router->get('{category_id}/subCategories/{user_id}','ArticleAndCategoryController@subCategories');
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
    $router->get('AllBinaries','BinaryController@AllBinaries');
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
    $router->get('StorePlanForUser/{id}', 'PlanController@StorePlanForUser');
    $router->get('AllUserPlan/{user_id}', 'PlanController@AllUserPlan');
    $router->get('UserExpirePlans/{id}','PlanController@UserExpirePlans');
});
/*
|--------------------------------------------------------------------------
| Push Notif Panel Routes
|--------------------------------------------------------------------------
*/
$router->group(['middleware'=>'cors','prefix' => '/push/','as'=>'push.'], function () use ($router) {
    Route::get('send','PushNotifsController@send_for_push');
    Route::get('call_python','PushNotifsController@call_python');
});

/*
|--------------------------------------------------------------------------
| ID-Pay Routes
|--------------------------------------------------------------------------
*/
$router->group(['middleware'=>'cors','prefix' => '/idPays/','as'=>'idPays.'], function () use ($router) {
    Route::get('transaction/{user_id}/{plan_id}','IDPay\IDPayController@transaction');
    Route::post('successfull_pay','IDPay\IDPayController@successfull_pay');

   
});

/*
|--------------------------------------------------------------------------
| User Panel Routes
|--------------------------------------------------------------------------
*/
$router->group(['middleware'=>'cors','prefix' => '/users/','as'=>'users.'], function () use ($router) {
    Route::get('','UserController@all_users');
    Route::get('users-who-buied/','UserController@users_who_buied');
    Route::get('logout-users/{user_id}','UserController@logout_users');


});

/*
|--------------------------------------------------------------------------
| User Panel Routes
|--------------------------------------------------------------------------
*/
$router->get('/', ['middleware' => ['cors'], function () {
    return view('app');
}]);
$router->get('/admin', ['middleware' => ['auth'], function () {
    return view('admin');
}]);
$router->get('/login', ['middleware' => ['cors'], function () {
    return view('auth/login');
}]);


$router->get('/sendFCM','FCM\FcmController@send_notif');
// $router->get('/sendFCM-topic','FCM\FcmController@send_notif_topic');
$router->get('/take-fcm-token','FCM\FcmController@take_token');



$router->get("/take-token/{user_id}","OneSignal\OneSignalController@take_app_token");




