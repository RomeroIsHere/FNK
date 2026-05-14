<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/found', function () {
        return view('foundtable');
    })->name('found');
    Route::get('/sought', function () {
        return view('soughttable');
    })->name('sought');
});
