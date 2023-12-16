<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PharmecyUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrescriptionController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:pharmacy_user'])->group(function () {
    Route::get('/pharmacy_dashboard', [PharmecyUserController::class, 'dashboard'])->name('pharmacy.dashboard');
    Route::get('/view_prescription/{id}', [PharmecyUserController::class, 'view_prescription'])->name('pharmecy.view_prescription');
    Route::post('/sendmail_to_user', [PharmecyUserController::class, 'sendMail'])->name('pharmacy.sendmail');
    // Route::get('/mailtest', [PharmecyUserController::class, 'sendMail'])->name('pharmacy.sendmail');
});


Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::post('/prescriptions', [PrescriptionController::class, 'store'])->name('prescription.store');
    Route::get('/respond_prescription/{id}', 
        [UserController::class, 'respondToPrescription'])->name('prescription.respond');
    Route::post('/respond_prescription/{id}', 
        [UserController::class, 'processApproval'])->name('prescription.processApproval');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
