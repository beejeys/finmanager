<?php

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
    return redirect('app');
});

Route::get('login', [App\Http\Controllers\UserController::class,'login']);
Route::post('login', [App\Http\Controllers\UserController::class,'do_login']);
Route::get('logout', [App\Http\Controllers\UserController::class,'logout']);

Route::get('app',[App\Http\Controllers\TransactionController::class,'home']);
Route::get('app/accounts',[App\Http\Controllers\AccountController::class,'index']);
Route::get('app/accounts/create',[App\Http\Controllers\AccountController::class,'create']);
Route::post('app/accounts/create',[App\Http\Controllers\AccountController::class,'store']);
Route::get('app/accounts/{id}/edit',[App\Http\Controllers\AccountController::class,'edit']);
Route::post('app/accounts/{id}/edit',[App\Http\Controllers\AccountController::class,'update']);
Route::get('app/accounts/{id}/del',[App\Http\Controllers\AccountController::class,'delete']);

Route::get('app/categories',[App\Http\Controllers\CategoryController::class,'index']);
Route::get('app/categories/create',[App\Http\Controllers\CategoryController::class,'create']);
Route::post('app/categories/create',[App\Http\Controllers\CategoryController::class,'store']);
Route::get('app/categories/{id}/edit',[App\Http\Controllers\CategoryController::class,'edit']);
Route::post('app/categories/{id}/edit',[App\Http\Controllers\CategoryController::class,'update']);
Route::get('app/categories/{id}/del',[App\Http\Controllers\CategoryController::class,'delete']);

Route::get('app/income',[App\Http\Controllers\TransactionController::class,'income']);
Route::get('app/income/add',[App\Http\Controllers\TransactionController::class,'create_income']);
Route::post('app/income/add',[App\Http\Controllers\TransactionController::class,'store_income']);
Route::get('app/income/{id}/edit',[App\Http\Controllers\TransactionController::class,'edit_income']);
Route::post('app/income/{id}/edit',[App\Http\Controllers\TransactionController::class,'update_income']);
Route::get('app/income/{id}/del',[App\Http\Controllers\TransactionController::class,'delete_income']);

Route::get('app/expense',[App\Http\Controllers\TransactionController::class,'expense']);
Route::get('app/expense/add',[App\Http\Controllers\TransactionController::class,'create_expense']);
Route::post('app/expense/add',[App\Http\Controllers\TransactionController::class,'store_expense']);
Route::get('app/expense/{id}/edit',[App\Http\Controllers\TransactionController::class,'edit_expense']);
Route::post('app/expense/{id}/edit',[App\Http\Controllers\TransactionController::class,'update_expense']);
Route::get('app/expense/{id}/del',[App\Http\Controllers\TransactionController::class,'delete_expense']);

Route::get('app/transfers',[App\Http\Controllers\TransactionController::class,'transfers']);
Route::get('app/transfers/add',[App\Http\Controllers\TransactionController::class,'create_transfer']);
Route::post('app/transfers/add',[App\Http\Controllers\TransactionController::class,'store_transfer']);
Route::get('app/transfers/{id}/edit',[App\Http\Controllers\TransactionController::class,'edit_transfer']);
Route::post('app/transfers/{id}/edit',[App\Http\Controllers\TransactionController::class,'update_transfer']);
Route::get('app/transfers/{id}/del',[App\Http\Controllers\TransactionController::class,'delete_transfer']);

Route::get('app/budget',[App\Http\Controllers\BudgetController::class,'index']);
Route::post('app/budget',[App\Http\Controllers\BudgetController::class,'store']);

Route::get('app/profile',[App\Http\Controllers\UserController::class,'profile']);
Route::post('app/profile',[App\Http\Controllers\UserController::class,'update_profile']);

// Route::get('app/transfers/add',[App\Http\Controllers\TransactionController::class,'create_transfer']);
// Route::post('app/transfers/add',[App\Http\Controllers\TransactionController::class,'store_transfer']);
// Route::get('app/transfers/{id}/edit',[App\Http\Controllers\TransactionController::class,'edit_transfer']);
// Route::post('app/transfers/{id}/edit',[App\Http\Controllers\TransactionController::class,'update_transfer']);
// Route::get('app/transfers/{id}/del',[App\Http\Controllers\TransactionController::class,'delete_transfer']);



