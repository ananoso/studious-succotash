<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::get('contracts', [\App\Http\Controllers\ContractController::class, 'index'])->name('contracts.index');
    Route::get('contracts/show/{contract}', [\App\Http\Controllers\ContractController::class, 'show'])->name('contracts.show');
    Route::get('contracts/create', [\App\Http\Controllers\ContractController::class, 'create'])->name('contracts.create');
    Route::post('contracts/create', [\App\Http\Controllers\ContractController::class, 'store'])->name('contracts.store');
    Route::get('contracts/edit/{contract}', [\App\Http\Controllers\ContractController::class, 'edit'])->name('contracts.edit');
    Route::post('contracts/update/{contract}', [\App\Http\Controllers\ContractController::class, 'update'])->name('contracts.update');
    Route::get('contracts/delete/{contract}', [\App\Http\Controllers\ContractController::class, 'delete'])->name('contracts.delete');
    Route::delete('contracts/destroy/{contract}', [\App\Http\Controllers\ContractController::class, 'destroy'])->name('contracts.destroy');
    Route::resource('user_contracts', \App\Http\Controllers\UserContractController::class);
    Route::get('user_contracts/create/{user_id}/{contract_id}', [\App\Http\Controllers\UserContractController::class, 'create'])->name('user_contracts.create');
    Route::get('user_contracts/edit/{user_id}/{contract_id}', [\App\Http\Controllers\UserContractController::class, 'edit'])->name('user_contracts.edit');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::resource('time_entry', \App\Http\Controllers\TimeEntryController::class);
    Route::resource('workers', \App\Http\Controllers\WorkerController::class);

});

Route::resource('posts', PostController::class); //to do usuniecia na dobra sprawe

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
