<?php

use Illuminate\Support\Facades\Route;
use App\Models\Visitor;
use App\Models\Visit;
use App\Http\Controllers\Admin\AdminDashboardController;

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
use App\Http\Controllers\ImageController; // Ensure this class exists in the specified namespace
use Illuminate\Support\Facades\Auth;

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
#------------ Image Gallery Routes -----------
Route::get('/gallery', [GalleryController::class, 'publicIndex'])->name('gallery');
Route::get('/gallery/create', [GalleryController::class, 'create'])->middleware('auth');
Route::post('/gallery', [GalleryController::class, 'store'])->middleware('auth')->name('gallery.store');

#------------ Admin Routes -----------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

require __DIR__ . '/auth.php';

