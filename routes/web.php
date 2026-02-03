<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventBookingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NominationController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update.submit');

// Route::get('/', function () {
//     return view('frontend.index');
// })->name('home');

// API Routes for Frontend
Route::get('/api/category-details', [FrontendController::class, 'getCategoryDetails'])->name('api.category-details');

// Nomination Routes
Route::post('/nomination/submit', [NominationController::class, 'store'])->name('nomination.submit');
Route::post('/nomination/check-discount', [NominationController::class, 'checkDiscount'])->name('nomination.check-discount');
Route::get('/nomination/pdf/{application_id}', [NominationController::class, 'generatePdf'])->name('nomination.pdf');
Route::post('/nomination/preview-pdf', [NominationController::class, 'previewPdf'])->name('nomination.preview-pdf');
Route::get('/nomination/evidence/download/{id}', [NominationController::class, 'downloadEvidence'])->name('nomination.evidence.download');
Route::get('/nomination/headshot/download/{application_id}', [NominationController::class, 'downloadHeadshot'])->name('nomination.headshot.download');

// Payment Routes
Route::post('/payment/initiate', [PaymentController::class, 'initiate'])->name('payment.initiate');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/failure', [PaymentController::class, 'failure'])->name('payment.failure');
Route::post('/payment/webhook/{gateway}', [PaymentController::class, 'webhook'])->name('payment.webhook');

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about-us');
Route::get('/categories', [FrontendController::class, 'categories'])->name('categories');
Route::get('/news-room', [FrontendController::class, 'newsRoom'])->name('news-room');
Route::get('/news-room/{id}', [FrontendController::class, 'newsRoomDetails'])->name('news-room-details');
Route::get('/events', [FrontendController::class, 'events'])->name('events');
Route::get('/event/{id}', [FrontendController::class, 'eventDetails'])->name('event-details');
Route::post('/event/book', [EventBookingController::class, 'store'])->name('event.book')->middleware('auth');
Route::post('/event/manual-payment', [EventBookingController::class, 'manualPaymentStore'])->name('event.manual-payment-store')->middleware('auth');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog/{id}', [FrontendController::class, 'blogDetails'])->name('blog-details');
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

// Judge Application Routes
Route::get('/judge-application', [\App\Http\Controllers\JudgeApplicationController::class, 'index'])->name('judge.application');
Route::post('/judge-application', [\App\Http\Controllers\JudgeApplicationController::class, 'store'])->name('judge.application.submit');
Route::get('/judge-application/questions/{category_id}', [\App\Http\Controllers\JudgeApplicationController::class, 'getQuestions'])->name('judge.application.questions');

// Policy Pages
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [FrontendController::class, 'termsAndConditions'])->name('terms-and-conditions');
Route::get('/cookie-policy', [FrontendController::class, 'cookiePolicy'])->name('cookie-policy');
Route::get('/cancellation-refund-policy', [FrontendController::class, 'cancellationRefundPolicy'])->name('cancellation-refund-policy');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [FrontendController::class, 'dashboardOverview'])->name('dashboard');
    Route::get('/dashboard/profile', [FrontendController::class, 'dashboardProfile'])->name('dashboard.profile');
    Route::get('/dashboard/password', [FrontendController::class, 'dashboardPassword'])->name('dashboard.password');
    Route::get('/dashboard/nominations', [FrontendController::class, 'dashboardNominations'])->name('dashboard.nominations');
    Route::get('/dashboard/nominations/{application_id}', [FrontendController::class, 'viewNomination'])->name('dashboard.nominations.view');
    Route::delete('/nomination/{application_id}', [NominationController::class, 'destroy'])->name('nomination.delete');
    Route::get('/dashboard/bookings', [FrontendController::class, 'dashboardBookings'])->name('dashboard.bookings');
    Route::get('/dashboard/ticket/view/{id}', [FrontendController::class, 'viewBooking'])->name('dashboard.bookings.view');

    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/password/update', [AuthController::class, 'updatePassword'])->name('password.update');
});
