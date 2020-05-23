<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// API routers
$router->group(['prefix' => 'api'], function () use ($router) { 

     $router->post('register', 'AuthController@register'); // route register user
     $router->post('login', 'AuthController@login'); //route login user
     $router->get('profile', 'UserController@profile'); // get profile user
     $router->get('users/{id}', 'UserController@singleUser'); // get one user by id
     $router->get('users', 'UserController@allUsers'); // get all users 

 });

