<?php

use App\Http\Controllers\Site\EnquiryController;
use App\Http\Controllers\Site\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public website
|--------------------------------------------------------------------------
*/

Route::view('/', 'site.home')->name('home');
Route::view('/our-story', 'site.our-story')->name('our-story');
Route::view('/menu', 'site.menu')->name('menu');
Route::view('/cakes', 'site.cakes')->name('cakes');
Route::view('/order-a-cake', 'site.order')->name('order');
Route::view('/experience', 'site.experience')->name('experience');
Route::view('/locations', 'site.locations')->name('locations');
Route::view('/contact', 'site.contact')->name('contact');

Route::post('/order-a-cake', [EnquiryController::class, 'cakeOrder'])
    ->middleware('throttle:6,1')
    ->name('order.store');
Route::post('/contact', [EnquiryController::class, 'contact'])
    ->middleware('throttle:6,1')
    ->name('contact.store');

Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

/*
|--------------------------------------------------------------------------
| Jetstream application
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
