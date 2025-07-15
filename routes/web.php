<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Models\Interview;
use App\Models\Ad;
use App\Models\Podcast;
use App\Models\Event;

// صفحة الترحيب (غير محمية)
Route::get('/', function () {
    return view('welcome');
});

// Login Routes (غير محمية)
Route::get('/thevisionlogin', [AuthController::class, 'showLogin'])->name('login');
Route::post('/thevisionlogin', [AuthController::class, 'login'])->name('login.post');

// Routes محمية بـ middleware
Route::middleware('check.auth')->group(function () {
    
    // Dashboard
    Route::get('/visionAdminDashboard', function () {
        $interviews = Interview::all();
        $ads = Ad::all();
        $podcasts = Podcast::all();
        $events = Event::all();
        
        return view('dashboard', [
            'interviews' => $interviews,
            'ads' => $ads,
            'podcasts' => $podcasts,
            'events' => $events
        ]);
    })->name('dashboard');

    // Interview Routes
    Route::get('/interviews', [InterviewController::class, 'index'])->name('interviews.index');
    Route::get('/CreateInterview', [InterviewController::class, 'create'])->name('interviews.create');
    Route::post('/CreateInterview', [InterviewController::class, 'store'])->name('interviews.store');
    Route::delete('/interviews/{id}', [InterviewController::class, 'destroy'])->name('interviews.destroy');

    // Ads Routes
    Route::get('/ads', [AdController::class, 'index'])->name('ads.index');
    Route::get('/CreateAd', [AdController::class, 'create'])->name('ads.create');
    Route::post('/CreateAd', [AdController::class, 'store'])->name('ads.store');
    Route::delete('/ads/{id}', [AdController::class, 'destroy'])->name('ads.destroy');

    // Podcasts Routes
    Route::get('/podcasts', [PodcastController::class, 'index'])->name('podcasts.index');
    Route::get('/CreatePodcast', [PodcastController::class, 'create'])->name('podcasts.create');
    Route::post('/CreatePodcast', [PodcastController::class, 'store'])->name('podcasts.store');
    Route::delete('/podcasts/{id}', [PodcastController::class, 'destroy'])->name('podcasts.destroy');

    // Events Routes
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/CreateEvent', [EventController::class, 'create'])->name('events.create');
    Route::post('/CreateEvent', [EventController::class, 'store'])->name('events.store');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

    // Logout Routes
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');
    
    // Session Check Route
    Route::get('/check-session', [AuthController::class, 'checkSession'])->name('check.session');
});

