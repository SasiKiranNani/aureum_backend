<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.index');
// })->name('home');

// API Routes for Frontend
Route::get('/api/category-details', [FrontendController::class, 'getCategoryDetails'])->name('api.category-details');

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about-us');
Route::get('/categories', [FrontendController::class, 'categories'])->name('categories');
Route::get('/news-room', [FrontendController::class, 'newsRoom'])->name('news-room');
Route::get('/news-room-details', [FrontendController::class, 'newsRoomDetails'])->name('news-room-details');
Route::get('/contact-us', [FrontendController::class, 'contactUs'])->name('contact-us');
Route::get('/nomination', [FrontendController::class, 'nomination'])->name('nomination');

Route::get('/award-trophy', [FrontendController::class, 'awardTrophy'])->name('award-trophy');
Route::get('/how-to-nominate', [FrontendController::class, 'howToNominate'])->name('how-to-nominate');
Route::get('/judges', [FrontendController::class, 'judges'])->name('judges');
Route::get('/judge-details', [FrontendController::class, 'judgeDetails'])->name('judge-details');
Route::get('/judging-criteria', [FrontendController::class, 'judgingCriteria'])->name('judging-criteria');
Route::get('/past-winners', [FrontendController::class, 'pastWinners'])->name('past-winners');
Route::get('/past-winner-details', [FrontendController::class, 'pastWinnerDetails'])->name('past-winner-details');
Route::get('/why-enter', [FrontendController::class, 'whyEnter'])->name('why-enter');

// Policy Pages
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [FrontendController::class, 'termsAndConditions'])->name('terms-and-conditions');
Route::get('/cookie-policy', [FrontendController::class, 'cookiePolicy'])->name('cookie-policy');
Route::get('/cancellation-refund-policy', [FrontendController::class, 'cancellationRefundPolicy'])->name('cancellation-refund-policy');
Route::get('/shipping-return-policy', [FrontendController::class, 'shippingReturnPolicy'])->name('shipping-return-policy');