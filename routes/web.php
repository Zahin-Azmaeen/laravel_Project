<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\DropDownController;
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


Route::controller(SampleController::class)->group(function () {

    Route::get('login', 'index')->name('login');

    Route::get('registration', 'registration')->name('registration');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');

    Route::post('validate_login', 'validate_login')->name('sample.validate_login');

    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('edit-data/{id}', 'editData')->name('editData');
    Route::get('edit-modal-data/{id}', 'editModalData')->name('editModalData');
    Route::post('/store-edit-data/{id}', 'storeEditData')->name('storeEditData');
});
Route::get('/drop', [DropDownController::class, 'index']);
Route::post('/dropdistricts', [DropdownController::class, 'fetchState']);
Route::post('/store-data', [DropdownController::class, 'storeData']);
