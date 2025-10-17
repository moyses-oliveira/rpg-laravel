<?php

use Illuminate\Support\Facades\Route;

Route::get('/docs', fn ()=>view('docs'));
Route::get('/demo', fn ()=>view('demo'));

Route::get('/', function () {
    return view('welcome');
});
