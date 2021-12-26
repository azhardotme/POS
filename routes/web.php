<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SuperAdminController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\PurchaseController;


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

//Unit
Route::get('/add-unit', [UnitController::class, 'create'])->name('create.unit');
Route::post('/add-unit', [UnitController::class, 'store'])->name('store.unit');
Route::get('/all-unit', [UnitController::class, 'index'])->name('view.unit');
Route::get('/edit-unit/{id}', [UnitController::class, 'edit'])->name('edit.unit');
Route::put('/update-unit/{id}', [UnitController::class, 'update'])->name('update.unit');
Route::delete('/delete-unit/{id}', [UnitController::class, 'destroy'])->name('delete.unit');

//Category
Route::get('/add-category', [CategoryController::class, 'create'])->name('create-category');
Route::post('/add-category', [CategoryController::class, 'store'])->name('store-category');
Route::get('/all-category', [CategoryController::class, 'index'])->name('view-category');
Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
Route::put('/update-category/{id}', [CategoryController::class, 'update'])->name('update-category');
Route::delete('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete-category');

//Product
Route::get('/add-product', [ProductController::class, 'create'])->name('create-product');
Route::post('/add-product', [ProductController::class, 'store'])->name('store-product');
Route::get('/all-product', [ProductController::class, 'index'])->name('view-product');
Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
Route::put('/update-product/{id}', [ProductController::class, 'update'])->name('update-product');
Route::delete('/delete-product/{id}', [ProductController::class, 'destroy'])->name('delete-product');

//Purchase
Route::get('/add-purchase', [PurchaseController::class, 'create'])->name('create-purchase');
Route::post('/add-purchase', [PurchaseController::class, 'store'])->name('store-purchase');
Route::get('/all-purchase', [PurchaseController::class, 'index'])->name('view-purchase');
Route::get('/edit-purchase/{id}', [PurchaseController::class, 'edit'])->name('edit-purchase');
Route::put('/update-purchase/{id}', [PurchaseController::class, 'update'])->name('update-purchase');
Route::delete('/delete-purchase/{id}', [PurchaseController::class, 'destroy'])->name('delete-purchase');
