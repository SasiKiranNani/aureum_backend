<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.index');
// })->name('home');

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about-us');
Route::get('/categories', [FrontendController::class, 'categories'])->name('categories');
Route::get('/news-room', [FrontendController::class, 'newsRoom'])->name('news-room');
Route::get('/news-room-details', [FrontendController::class, 'newsRoomDetails'])->name('news-room-details');
Route::get('/contact-us', [FrontendController::class, 'contactUs'])->name('contact-us');