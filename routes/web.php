<?php

use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\StructureController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileAdminController;

use App\Http\Controllers\Public\CampaignController as PublicCampaignController;
use App\Http\Controllers\Public\DonasiController;
use App\Http\Controllers\Public\ArtikelController as PublicArtikelController;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route Dashboard Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('campaigns', CampaignController::class);
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::resource('announcements', AnnouncementController::class);
    Route::resource('structures', StructureController::class);
    Route::resource('artikels', ArtikelController::class);
    Route::resource('manajemen-users', UserController::class);
    Route::get('/profile', [ProfileAdminController::class, 'index'])->name('profiles.index');
    Route::patch('/profile', [ProfileAdminController::class, 'update'])->name('profiles.update');
});

//Route Page Utama
Route::get('/galeri', [FrontendController::class, 'galeri'])->name('galeri.index');
Route::get('/transparansi', [FrontendController::class, 'transparansi'])->name('transparansi.index');

Route::get('/kabar-santri', [FrontendController::class, 'artikel'])->name('artikel.index');
Route::get('/kabar-santri/{slug}', [FrontendController::class, 'showArtikel'])->name('artikel.show');

Route::get('/struktur-organisasi', [FrontendController::class, 'struktur'])->name('struktur.index');


// Route Public Controller
Route::get('/program', [PublicCampaignController::class, 'index'])->name('campaigns.index');
Route::get('/program/{slug}', [PublicCampaignController::class, 'show'])->name('campaigns.show');

Route::get('/program/{slug}/donasi', [DonasiController::class, 'index'])->name('campaigns.donasi');

Route::get('/kabar-santri', [PublicArtikelController::class, 'index'])->name('artikel.index');
Route::get('/kabar-santri/{slug}', [PublicArtikelController::class, 'show'])->name('artikel.show');


require __DIR__.'/auth.php';
