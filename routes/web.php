<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SuperAdminController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\CustomerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//auth
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin-dashboard', [SuperAdminController::class, 'dashboard']);
Route::get('/logout', [SuperAdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'show_dashboard']);

// supplier
// Route::prefix('s')->group(function () {
//     Route::get('/users', function () {
//         // Matches The "/admin/users" URL
//     });
// });

Route::get('/add-supplier', [SupplierController::class, 'create'])->name('create.supplier');
Route::post('/add-supplier', [SupplierController::class, 'store'])->name('store.supplier');
Route::get('/all-supplier', [SupplierController::class, 'index'])->name('view.supplier');
Route::get('/edit-supplier/{id}', [SupplierController::class, 'edit'])->name('edit.supplier');
Route::put('/update-supplier/{id}', [SupplierController::class, 'update'])->name('update.supplier');
Route::delete('/delete-supplier/{id}', [SupplierController::class, 'destroy'])->name('delete.supplier');

//Customer
Route::get('/add-customer', [CustomerController::class, 'create'])->name('create.customer');
Route::post('/add-customer', [CustomerController::class, 'store'])->name('store.customer');
Route::get('/all-customer', [CustomerController::class, 'index'])->name('view.customer');
Route::get('/edit-customer/{id}', [CustomerController::class, 'edit'])->name('edit.customer');
Route::put('/update-customer/{id}', [CustomerController::class, 'update'])->name('update.customer');
Route::delete('/delete-customer/{id}', [CustomerController::class, 'destroy'])->name('delete.customer');
