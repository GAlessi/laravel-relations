<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', 'MainController@home') -> name('home');
Route::get('/home/pilot/{id}', 'MainController@showPilot') -> name ('show');
