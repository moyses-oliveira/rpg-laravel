<?php

use Illuminate\Support\Facades\Route;

Route::get('/docs', fn ()=>view('docs'));
Route::get('/demo', fn ()=>view('demo'));
Route::get('/mockup/{v}', fn ($v)=>view("mockup.$v"));

Route::get('/', function () {
    return view('welcome');
});
