<?php

use Illuminate\Support\Facades\Route;

Route::get('/signin', \App\Livewire\SignIn::class)->name('sign-in')->middleware('guest');
Route::get('/signup', \App\Livewire\SignUp::class)->name('sign-up')->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->middleware('role:user,moderator,admin')->name('dashboard');
    Route::get('/report', \App\Livewire\Report::class)->middleware('role:user,moderator,admin')->name('report');
    Route::get('/items/{item}', \App\Livewire\Item::class)->name('item');
});

