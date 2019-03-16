<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'SignupController@index');


    $router->resource('scorerule', ScoreruleController::class);
    $router->resource('brand', BrandController::class);
    $router->resource('danmu', DanmuController::class);
    $router->resource('signup', SignupController::class);
    $router->resource('award', RewardController::class);
    $router->resource('user', UserController::class);
    $router->resource('scoreuser', ScoreuserController::class);
    $router->resource('zhuli', ZhuliController::class);
    $router->resource('zhuan', ZhuanController::class);
    $router->resource('scorep', ScorepController::class);
    $router->resource('zhulip', ZhulipController::class);

    $router->resource('active', ActiveController::class);
    $router->get('/yuyue', 'YuyueController@index');
    $router->resource('bmlist', JuanBmlistController::class);

});
