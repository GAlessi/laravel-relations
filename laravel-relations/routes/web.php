<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', 'MainController@home')
    -> name('home');

Route::get('/home/pilot/{id}', 'MainController@showPilot')
    -> name ('show');

Route::get('/car/create', 'MainController@createCar')
    -> name('createCar');
Route::post('/car/store', 'MainController@storeCar')
    -> name('storeCar');

Route::get('destroy/{id}', 'MainController@destroy')
    -> name('destroy');
