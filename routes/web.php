<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeExportController;
use App\Http\Controllers\EmployeeDashboardController;
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
    Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('grade', GradeController::class);
    Route::resource('regions', RegionController::class);
    Route::resource('employes', EmployeController::class);
    Route::resource('emplois', EmploiController::class);
    Route::resource('historique_employes', HistoriqueEmployeController::class);

    // Paramètres du compte
    Route::view('profil/settings', 'admin.profils.settings')->name('profil.settings');

    // Page support
    Route::view('profil/support', 'admin.profils.suport')->name('profil.support');

    // Soumission support
    Route::post('profil/support', [SupportController::class, 'send'])->name('profil.support.send');

    // Export employes
    Route::get('employes/export/pdf', [EmployeExportController::class, 'exportAllPdf'])->name('employes.export.all.pdf');
    Route::get('employes/export/excel', [EmployeExportController::class, 'exportAllExcel'])->name('employes.export.all.excel');

    // Export historique employes
    Route::get('historique_employes/export/pdf', [HistoriqueEmployeController::class, 'exportPDF'])->name('historique.export.pdf');
    Route::get('historique_employes/export/excel', [HistoriqueEmployeController::class, 'exportExcel'])->name('historique.export.excel');
});

// Route dashboard employé
Route::middleware(['auth'])->prefix('employee')->name('employee.')->group(function () {
    Route::get('dashboard', [EmployeeDashboardController::class, 'index'])->name('dashboard');

    Route::get('export/pdf', [EmployeeExportController::class, 'exportPdf'])->name('export.pdf');

    // Autres routes employé à ajouter ici
});



require __DIR__.'/auth.php';

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\GradeController;
// use App\Http\Controllers\EmploiController;
// use App\Http\Controllers\RegionController;
// use App\Http\Controllers\EmployeController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\SupportController;
// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\EmployeeExportController;
// use App\Http\Controllers\EmployeeDashboardController;
// use App\Http\Controllers\HistoriqueEmployeController;
// use App\Http\Controllers\Admin\EmployeExportController;

// // Page d'accueil
// Route::get('/', function () {
//     return view('welcome');
// });

// // Routes Auth
// require __DIR__.'/auth.php';

// // Routes Profil
// Route::middleware('auth')->group(function () {
//     Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// // 👑 Routes Admin
// Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
//     Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     Route::get('dashboard/filter', [DashboardController::class, 'filter'])->name('dashboard.filter');

//     Route::resource('grade', GradeController::class);
//     Route::resource('regions', RegionController::class);
//     Route::resource('employes', EmployeController::class);
//     Route::resource('emplois', EmploiController::class);
//     Route::resource('historique_employes', HistoriqueEmployeController::class);

//     Route::view('profil/settings', 'admin.profils.settings')->name('profil.settings');
//     Route::view('profil/support', 'admin.profils.suport')->name('profil.support');
//     Route::post('profil/support', [SupportController::class, 'send'])->name('profil.support.send');

//     // Exportations
//     Route::get('employes/export/pdf', [EmployeExportController::class, 'exportAllPdf'])->name('employes.export.all.pdf');
//     Route::get('employes/export/excel', [EmployeExportController::class, 'exportAllExcel'])->name('employes.export.all.excel');
//     Route::get('historique_employes/export/pdf', [HistoriqueEmployeController::class, 'exportPDF'])->name('historique.export.pdf');
//     Route::get('historique_employes/export/excel', [HistoriqueEmployeController::class, 'exportExcel'])->name('historique.export.excel');
// });

// // 👤 Routes Employé
// Route::middleware(['auth'])->prefix('employee')->name('employee.')->group(function () {
//     Route::get('dashboard', [EmployeeDashboardController::class, 'index'])->name('dashboard');
//     Route::get('export/pdf', [EmployeeExportController::class, 'exportPdf'])->name('export.pdf');

//     // Ajoute d’autres routes employé ici
// });
