<?php

use Illuminate\Support\Facades\Route;
use App\Models\Visitor;
use App\Models\Visit;
use App\Http\Controllers\{
    ProfileController,
    VisitorController,
    HomeController,
    AboutController,
    InfrastructureController,
    AdmissionController,
    TeamController,
    GalleryController,
    ResultsController,
    StudentPortalController,
    ContactController,
    Auth\AuthenticatedSessionController,
    AboutUsController
};

#------------ Visitor Count Routes -----------
Route::middleware('web')->group(function () {
    Route::post('/track-visit', [VisitorController::class, 'trackVisit'])->name('visitor.track');
    Route::get('/visitors/total', [VisitorController::class, 'getTotalUniqueVisitors']);
    Route::get('/visitors/today', [VisitorController::class, 'getTodayUniqueVisitors']);
    Route::get('/visitors/realtime', [VisitorController::class, 'getRealtimeVisitors']);
});

#------------ Static Page Routes -----------
Route::get('/about-public', [AboutUsController::class, 'publicView'])->name('about.public');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/infrastructure', [InfrastructureController::class, 'publicIndex'])->name('infrastructure');
Route::get('/admission', [AdmissionController::class, 'publicIndex'])->name('admission');
Route::post('/admission', [AdmissionController::class, 'submit'])->name('admission.submit');
Route::get('/team', [TeamController::class, 'publicIndex'])->name('team');
Route::get('/gallery', [GalleryController::class, 'publicIndex'])->name('gallery');
Route::get('/results', [ResultsController::class, 'index'])->name('results');
Route::get('/student-portal', [StudentPortalController::class, 'index'])->name('student-portal');
Route::get('/contact', [ContactController::class, 'publicIndex'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

#------------ Home Page with Visitor Data -----------
Route::get('/', function () {
    return view('welcome', [
        'totalVisitors' => Visitor::count(),
        'totalVisits' => Visit::count(),
    ]);
})->name('home');

#------------ Dashboard & Auth-Protected Routes -----------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

#------------ Authentication Routes -----------
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__ . '/auth.php';
