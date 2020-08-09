<?php

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
    return  'Welcome to Discussion Apis';
});

$router->get('/api/documentation', function () use ($router) {
    return view('vendor/swagger-lume/index', ['urlToDocs' => 'http://localhost:8000/docs']);
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('channels',  ['uses' => 'ChannelController@showAllChannels']);

    $router->get('channels/{id}', ['uses' => 'ChannelController@showOneChannel']);

    $router->post('channels', ['uses' => 'ChannelController@create']);

    $router->delete('channels/{id}', ['uses' => 'ChannelController@delete']);

    $router->put('channels/{id}', ['uses' => 'ChannelController@update']);


    $router->get('users',  ['uses' => 'UserController@showAllUsers']);

    $router->get('users/{id}', ['uses' => 'UserController@showOneUser']);

    $router->post('users', ['uses' => 'UserController@create']);

    $router->delete('users/{id}', ['uses' => 'UserController@delete']);

    $router->put('users/{id}', ['uses' => 'UserController@update']);



    $router->get('subcribers',  ['uses' => 'SubcribersController@showAllSubcribers']);

    $router->get('subcribers/{id}', ['uses' => 'SubcribersController@showOneSubcriber']);
    $router->get('subcribers/{channelId}/count', ['uses' => 'SubcribersController@getSubcribersCount']);

    $router->post('subcribers', ['uses' => 'SubcribersController@create']);

    $router->delete('subcribers/{id}/{channelId}', ['uses' => 'SubcribersController@delete']);

    $router->put('subcribers/{id}', ['uses' => 'SubcribersController@update']);



    $router->get('posts/channel/{id}',  ['uses' => 'PostController@showAllPosts']);

    $router->get('posts/{id}', ['uses' => 'PostController@showOnePost']);

    $router->post('posts', ['uses' => 'PostController@create']);

    $router->delete('posts/{id}', ['uses' => 'PostController@delete']);

    $router->put('posts/{id}', ['uses' => 'PostController@update']);


    $router->get('postlikes/{postid}/count', ['uses' => 'PostLikesController@getPostLikesCount']);
    $router->post('postlikes', ['uses' => 'PostLikesController@create']);
    $router->delete('postlikes/{id}/{userId}', ['uses' => 'PostLikesController@delete']);


    $router->get('replies/post/{id}',  ['uses' => 'RepliesController@showAllreplies']);
    $router->get('replies/{id}', ['uses' => 'RepliesController@showOnereply']);
    $router->post('replies', ['uses' => 'RepliesController@create']);
    $router->delete('replies/{id}', ['uses' => 'RepliesController@delete']);
    $router->put('replies/{id}', ['uses' => 'RepliesController@update']);



  });