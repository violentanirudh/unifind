<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class)->name('home')->middleware('guest');
Route::get('/home', \App\Livewire\Home::class)->name('home.guest');
Route::get('/hall-of-fame', \App\Livewire\Hall::class)->name('hall-of-fame');
Route::get('/signin', \App\Livewire\SignIn::class)->name('sign-in')->middleware('guest');
Route::get('/signup', \App\Livewire\SignUp::class)->name('sign-up')->middleware('guest');
Route::redirect('/login', '/signin')->name('login');

Route::middleware(['auth', 'role:user,moderator,admin'])->group(function () {
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/feeds', \App\Livewire\Feeds::class)->name('feeds');
    Route::get('/report', \App\Livewire\Report::class)->name('report');
    Route::get('/profile', \App\Livewire\Profile::class)->name('profile');
    Route::get('/items/{item}', \App\Livewire\Item::class)->name('item');

    Route::get('/logout', function () {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('home');
    })->name('logout');
});

//  Staff Routes

Route::prefix('management')->middleware(['auth', 'role:moderator,admin'])->group(function () {
    Route::get('/', \App\Livewire\Management\Dashboard::class)->name('management.dashboard');
    Route::get('/items', \App\Livewire\Management\Items::class)->name('management.items');
    Route::get('/feeds', \App\Livewire\Management\Feeds::class)->name('management.feeds');
    Route::get('/users', \App\Livewire\Management\Users::class)->name('management.users');
    Route::get('/reports', \App\Livewire\Management\Reports::class)->name('management.reports');
    Route::get('/rewards', \App\Livewire\Management\Rewards::class)->name('management.rewards');
});
