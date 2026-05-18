<?php

use App\Http\Controllers\foundedit;
use App\Http\Controllers\soughtedit;
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
    
    Route::get('/soughtedit/{id}', [soughtedit::class, 'show'])->name('soughtedit');
    Route::get('/foundedit/{id}', [foundedit::class, 'show'])->name('foundedit');
});
