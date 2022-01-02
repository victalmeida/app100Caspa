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

    return view('index', ['App' => '100Caspa']);
    // return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router){

    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');


    ## Usuarios Rotas
    $router->post('register', 'Usuarios@store');
    $router->get('usuario', 'Usuarios@getUsuario');

    ## Configuracao Rotas
    $router->post('usuario/configuracao', 'UsuariosConfiguracoes@store');
    $router->get('usuario/configuracao', 'UsuariosConfiguracoes@get');

});
