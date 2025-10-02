<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class)->name('home')->middleware('guest');
Route::get('/home', \App\Livewire\Home::class)->name('home.guest');
Route::get('/signin', \App\Livewire\SignIn::class)->name('sign-in')->middleware('guest');
Route::get('/signup', \App\Livewire\SignUp::class)->name('sign-up')->middleware('guest');
Route::redirect('/login', '/signin')->name('login');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->middleware('role:user,moderator,admin')->name('dashboard');
    Route::get('/report', \App\Livewire\Report::class)->middleware('role:user,moderator,admin')->name('report');
    Route::get('/profile', \App\Livewire\Profile::class)->name('profile');
    Route::get('/items/{item}', \App\Livewire\Item::class)->name('item');

    Route::get('/logout', function () {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('home');
    })->name('logout');
});

