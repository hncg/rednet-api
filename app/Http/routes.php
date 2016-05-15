<?php
Route::group(['prefix' => '/v1'], function(){
    Route::group(['prefix' => '/user/{user_id}', 'where' => ['user_id' => '[0-9]+']], function(){
    });
    Route::resource('/mood', 'MoodController',['only' => ['index', 'show']]);
});

Route::get('/404', 'ErrorController@error');
Route::get('/ping', 'PingController@ping');
