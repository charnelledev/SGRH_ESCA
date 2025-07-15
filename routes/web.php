<?php

// use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/admin', function () {
//     return view('pages.dashboard-app');
// });
// Route::get('/admin/form-elements', function () {
//     return view('pages.admin.form-elements');
// })->name('admin.form-elements');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoriqueEmployeController;
use App\Http\Controllers\Admin\EmployeExportController;

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/admin/dashboard', function () {
//     return view('pages.dashboard');
// })->middleware(['auth', 'verified'])->name('admin.dashboard');


Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::get('/admin/dashboard/filter', [DashboardController::class, 'filter'])->name('admin.dashboard.filter');

Route::get('/admin/form-elements', function () {
    return view('pages.admin.form-elements');
})->name('admin.form-elements');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Paramètres du compte
    Route::view('/profil/settings', 'admin.profils.settings')->name('profil.settings');

    // Page de support
    Route::view('/profil/support', 'admin.profils.suport')->name('profil.support');

    // Pour soumettre le support (optionnel)
    Route::post('/profil/support', [SupportController::class, 'send'])->name('profil.support.send');
});


Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('grade', GradeController::class);
    Route::resource('regions', RegionController::class);
    Route::resource('employes', EmployeController::class);
    Route::resource('emplois', EmploiController::class);
    Route::resource('historique_employes', HistoriqueEmployeController::class);
});





// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::resource('grade',GradeController::class);
// });

// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::resource('regions',RegionController::class);
// });

// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::resource('employes', EmployeController::class);
// });

// Route::prefix('admin')->name('admin.')->group(function () {
// Route::resource('emplois', EmploiController::class);
// });

// Route::prefix('admin')->name('admin.')->group(function () {
// Route::resource('historique_employes', HistoriqueEmployeController::class);
// });


Route::get('/admin/employes/export/pdf', [EmployeExportController::class, 'exportAllPdf'])->name('employes.export.all.pdf');
Route::get('/admin/employes/export/excel', [EmployeExportController::class, 'exportAllExcel'])->name('employes.export.all.excel');
require __DIR__.'/auth.php';

