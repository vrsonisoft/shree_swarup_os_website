<?php

use App\Http\Controllers\CustomMenuController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\DisableFrontend;
use Illuminate\Support\Facades\Route;

Route::get('/manifest.json', [HomeController::class, 'manifest'])->name('manifest');

Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeController::class, 'landing'])->name('home')->middleware(DisableFrontend::class);
    Route::get('/change-locale/{locale}', [HomeController::class, 'changeLocale'])->name('change.locale');
    Route::get('/restaurant-signup', [HomeController::class, 'signup'])->name('restaurant_signup');
    Route::get('/features', [HomeController::class, 'features'])->name('landing.features');
    Route::get('/pricing', [HomeController::class, 'pricingPage'])->name('landing.pricing');
    Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('landing.about');
    Route::get('/tutorials', [HomeController::class, 'tutorials'])->name('landing.tutorials');
    Route::get('/tutorials/{slug}', [HomeController::class, 'tutorialDetail'])->name('landing.tutorial_detail');
    Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('landing.privacy');
    Route::get('/cookie-policy', [HomeController::class, 'cookiePolicy'])->name('landing.cookie_policy');
    Route::get('/terms-and-conditions', [HomeController::class, 'termsConditions'])->name('landing.terms');
    Route::get('/refund-policy', [HomeController::class, 'refundPolicy'])->name('landing.refund_policy');
    Route::get('/gdpr-compliance', [HomeController::class, 'gdprCompliance'])->name('landing.gdpr');
    Route::get('/page/{slug}', [CustomMenuController::class, 'index'])->name('customMenu');
});
