<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', 'MainController@home') -> name('home');
