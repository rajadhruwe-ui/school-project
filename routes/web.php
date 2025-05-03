<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Visitor;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\InfrastructureController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\StudentPortalController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AboutUsController;
#------------visitor-count-----------


Route::middleware('web')->group(function () {
    // Track visits
    Route::post('/track-visit', [VisitorController::class, 'trackVisit'])->name('visitor.track');
    // Route::post('/track-visit', [VisitorController::class, 'trackVisit'])->name('visitor.track');
    Route::get('/visitors/total', [VisitorController::class, 'getTotalUniqueVisitors']);
    Route::get('/visitors/today', [VisitorController::class, 'getTodayUniqueVisitors']);
    Route::get('/visitors/realtime', [VisitorController::class, 'getRealtimeVisitors']);
    // Get statistics (protected routes)
    // Route::middleware('auth')->group(function () {
    //     Route::get('/visitors/total', [VisitorController::class, 'getTotalUniqueVisitors']);
    //     Route::get('/visitors/today', [VisitorController::class, 'getTodayUniqueVisitors']);
    //     Route::get('/visitors/stats', [VisitorController::class, 'getVisitorStats']);
    //     Route::get('/visitors/realtime', [VisitorController::class, 'getRealtimeVisitors']);
    // });
});
#------------visitor-count-----------
// About Route
Route::get('/about-public', [AboutUsController::class, 'publicView'])->name('about.public');


// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Us Route
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Infrastructure Route
Route::get('/infrastructure', [InfrastructureController::class, 'publicIndex'])->name('infrastructure');

// Admission Route
Route::get('/admission', [AdmissionController::class, 'publicIndex'])->name('admission');
Route::post('/admission', [AdmissionController::class, 'submit'])->name('admission.submit');


// Team Route
Route::get('/team', [TeamController::class, 'publicIndex'])->name('team');

// Gallery Route
Route::get('/gallery', [GalleryController::class, 'publicIndex'])->name('gallery');

// Results Route
Route::get('/results', [ResultsController::class, 'index'])->name('results');

// Student Portal Route
Route::get('/student-portal', [StudentPortalController::class, 'index'])->name('student-portal');
// Contact Route
Route::get('/contact', [ContactController::class, 'publicIndex'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Authentication Routes
Route::middleware(['auth'])->group(function () {
    // Profile Route
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
});

// Authentication Routes for Login and Logout
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


#------------welcome--------
Route::get('/', function () {
    return view('welcome');
});
#------------welcome--------
#------------home--------
Route::get('/home', function () {
    return view('home');
});
#------------home--------
Route::get('/about', function () {
    return view('about');
});
#------------dashboard--------

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
#------------dashboard--------
#------------auth-profile--------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
#------------auth-profile--------
require __DIR__ . '/auth.php';
