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

#Auth
$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('/register', [ 
        'as' => 'auth.register',
        'uses' => 'UserController@register'
    ]);
    
    $router->post('/login', [ 
        'as' => 'auth.login',
        'uses' => 'UserController@login' 
    ]);
    
    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->get('/profile', [ 
            'as' => 'auth.profile',
            'uses' => 'UserController@profile' 
        ]);
    
        $router->get('/logout', [ 
            'as' => 'auth.logout',
            'uses' => 'UserController@logout' 
        ]);
    });
});

# States
$router->group(['prefix' => 'state'], function() use ($router) {
    $router->get('/', 'StateController@getAll');
    $router->get('/{id}', 'StateController@getById');
    $router->post('/new', 'StateController@created');
    $router->put('/update/{id}', 'StateController@update');
});

# Students
$router->group(['prefix' => 'city'], function() use ($router) {
    $router->get('/', 'CityController@getAll');
    $router->get('/{id}', 'CityController@getById');
    $router->post('/new', 'CityController@created');
    $router->put('/update/{id}', 'CityController@update');
});

# Students
$router->group(['prefix' => 'student'], function() use ($router) {
    $router->get('/', 'StudentController@getAll');
    $router->get('/{id}', 'StudentController@getById');
    $router->post('/new', 'StudentController@created');
    $router->put('/update/{id}', 'StudentController@update');
});
