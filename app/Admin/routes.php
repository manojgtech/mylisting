<?php

//use App\Models\category;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('adminusers', AdminUserController::class);
$router->resource('adminlistings', ListingController::class);
$router->resource('adminblogs', BlogController::class);
$router->resource('admincategories', CategoryController::class);
$router->resource('adminblogs', BlogController::class);
$router->resource('admincity', CityController::class);

});


