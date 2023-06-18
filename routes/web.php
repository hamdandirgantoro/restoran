<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [MakananController::class, 'makananHome'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('admin');
    Route::get('/admin/user', [AdminController::class, 'adminUser'])->middleware(['auth', 'verified'])->name('admin.user');
    Route::get('/admin/makanan', [AdminController::class, 'adminMakanan'])->middleware(['auth', 'verified'])->name('admin.makanan');
    Route::get('/admin/pesanan', [AdminController::class, 'adminPesanan'])->middleware(['auth', 'verified'])->name('admin.pesanan');
    Route::get('/admin/feedback', [AdminController::class, 'adminFeedback'])->middleware(['auth', 'verified'])->name('admin.feedback');
    Route::get('/admin/komentar', [AdminController::class, 'adminKomentar'])->middleware(['auth', 'verified'])->name('admin.komentar');
    Route::get('/admin/create/user', [AdminController::class, 'adminUserCreate'])->middleware(['auth', 'verified'])->name('admin.user.create');
    Route::get('/admin/create/makanan', [AdminController::class, 'adminMakananCreate'])->middleware(['auth', 'verified'])->name('admin.makanan.create');
    Route::get('/admin/create/pesanan', [AdminController::class, 'adminPesananCreate'])->middleware(['auth', 'verified'])->name('admin.pesanan.create');
    Route::post('/admin/create/user', [AdminController::class, 'adminUserStore'])->middleware(['auth', 'verified'])->name('admin.user.store');
    Route::post('/admin/create/makanan', [AdminController::class, 'adminMakananStore'])->middleware(['auth', 'verified'])->name('admin.makanan.store');
    Route::post('/admin/create/pesanan', [AdminController::class, 'adminPesananStore'])->middleware(['auth', 'verified'])->name('admin.pesanan.store');
    Route::get('/admin/user/{id}/edit', [AdminController::class, 'adminUserEdit'])->middleware(['auth', 'verified'])->name('admin.user.edit');
    Route::get('/admin/makanan/{id}/edit', [AdminController::class, 'adminMakananEdit'])->middleware(['auth', 'verified'])->name('admin.makanan.edit');
    Route::get('/admin/pesanan/{id}/edit', [AdminController::class, 'adminPesananEdit'])->middleware(['auth', 'verified'])->name('admin.pesanan.edit');
    Route::put('/admin/user/{id}/update', [AdminController::class, 'adminUserUpdate'])->middleware(['auth', 'verified'])->name('admin.user.update');
    Route::put('/admin/makanan/{id}/update', [AdminController::class, 'adminMakananUpdate'])->middleware(['auth', 'verified'])->name('admin.makanan.update');
    Route::put('/admin/pesanan/{id}/update', [AdminController::class, 'adminPesananUpdate'])->middleware(['auth', 'verified'])->name('admin.pesanan.update');
    Route::delete('/admin/makanan/{id}/delete', [AdminController::class, 'adminMakananDestroy'])->middleware(['auth', 'verified'])->name('admin.makanan.destroy');
    Route::delete('/admin/user/{id}/delete', [AdminController::class, 'adminUserDestroy'])->middleware(['auth', 'verified'])->name('admin.user.destroy');
    Route::delete('/admin/pesanan/{id}/delete', [AdminController::class, 'adminPesananDestroy'])->middleware(['auth', 'verified'])->name('admin.pesanan.destroy');
    Route::delete('/admin/feedback/{id}/delete', [AdminController::class, 'adminFeedbackDestroy'])->middleware(['auth', 'verified'])->name('admin.feedback.destroy');
    Route::delete('/admin/komentar/{id}/delete', [AdminController::class, 'adminKomentarDestroy'])->middleware(['auth', 'verified'])->name('admin.komentar.destroy');
    Route::delete('/komentar/{id_komentar}/{id}/delete', [MakananController::class, 'deleteKomentar'])->middleware(['auth', 'verified'])->name('komentar.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/pesanan', [PesananController::class, 'listBelumDibayar'])->name('pesanan');
    Route::get('/pesanan/terbayar', [PesananController::class, 'listSudahDibayar'])->name('pesananterbayar');
    Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
    Route::put('/pesanan/{id}/update-status', [PesananController::class, 'update'])->name('pesanan.update');
    Route::get('/isi_dompet', [ProfileController::class, 'dompet'])->name('dompet');
    Route::post('/isi_dompet/uang_masuk', [ProfileController::class, 'isiDompet'])->name('dompet.isi');
    Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback');
    Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/makanan/{id}/detail', [MakananController::class, 'detailMakanan'])->name('makanan.detail');
    Route::post('/komentar/post/{id}', [MakananController::class, 'postingKomentar'])->name('komentar.post');
    Route::post('/komentar/edit/{id}', [MakananController::class, 'editKomentar'])->name('komentar.edit');
});

require __DIR__ . '/auth.php';
