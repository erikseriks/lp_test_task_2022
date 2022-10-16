<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */

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

$router->group(['prefix' => '/cv'], static function (Router $router): void {
    $router->get('/', 'CvController@index');
    $router->post('/', 'CvController@create');
    $router->get('/{id}', 'CvController@get');
    $router->patch('/{id}', 'CvController@update');
    $router->delete('/{id}', 'CvController@delete');
});
