<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/About', function () {
    return view('About');
})->name('About');