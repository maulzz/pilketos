<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\VotingController;

// admin route start
Route::get('admin/dashboard', [ViewController::class, 'dashboard']) -> middleware(['admin', 'auth']) ->name('admin.dashboard');

Route::get('admin/siswa', [ViewController::class, 'siswa']) -> middleware(['admin', 'auth']) ->name('admin.siswa');
Route::post('admin/siswa', [SiswaController::class, 'create']) -> middleware(['admin', 'auth']) ->name('admin.siswa.create');
Route::patch('admin/siswa', [SiswaController::class, 'import']) -> middleware(['admin', 'auth']) ->name('admin.siswa.import');
Route::put('admin/siswa/{id}', [SiswaController::class, 'update']) -> middleware(['admin', 'auth']) ->name('admin.siswa.update');

Route::get('admin/kandidat', [ViewController::class, 'kandidat']) -> middleware(['admin', 'auth']) ->name('admin.kandidat');
Route::post('admin/kandidat', [KandidatController::class, 'create']) -> middleware(['admin', 'auth']) ->name('admin.kandidat.create');
Route::put('admin/kandidat/{id}', [KandidatController::class, 'update']) -> middleware(['admin', 'auth']) ->name('admin.kandidat.update');
Route::delete('admin/kandidat/{id}', [KandidatController::class, 'delete']) -> middleware(['admin', 'auth']) ->name('admin.kandidat.delete');

Route::get('admin/monitoring', [ViewController::class, 'monitoring']) -> middleware(['admin', 'auth']) ->name('admin.monitoring');
Route::put('admin/monitoring', [VotingController::class, 'voting_setting']) -> middleware(['admin', 'auth']) ->name('admin.monitoring.setting');
// admin route end

Route::get('/', function () {
    return redirect()->route('login');
});


// siswa route start
Route::get('/home', [ViewController::class,'home_siswa'])->middleware(['auth', 'siswa'])->name('home');
Route::get('/profil_kandidat', [ViewController::class,'profil_kandidat'])->middleware(['auth', 'siswa'])->name('profil_kandidat');
Route::get('/voting', [ViewController::class,'voting'])->middleware(['auth', 'siswa', 'check.voting.status'])->name('voting');
Route::post('/voting', [VotingController::class, 'vote'])->middleware(['auth', 'siswa'])->name('voting.vote');

// siswa route end


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
