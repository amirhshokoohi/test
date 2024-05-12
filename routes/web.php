<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Dashboard;
use App\Livewire\Dashboard;
use App\Livewire\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/', 'App\Http\Controllers\LoginController@authenticated')->name('login.store');


/*Route::middleware(['auth'])->group(function () {
<<<<<<< HEAD
    Route::get('/admin/dashboard', \App\Http\Livewire\Dashboard::class)->name('dashboard');;
    Route::get('/admin/get-cpudata', \App\Http\Livewire\Dashboard::class);
    Route::get('/get-ramdata', \App\Http\Livewire\Dashboard::class)->name('admin.updateCharts');
    Route::get('/get-diskdata', \App\Http\Livewire\Dashboard::class)->name('admin.updateCharts');
=======
    Route::get('/admin/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');;
    Route::get('/admin/get-cpudata', \App\Livewire\Dashboard::class);
    Route::get('/get-ramdata', \App\Livewire\Dashboard::class)->name('admin.updateCharts');
    Route::get('/get-diskdata', \App\Livewire\Dashboard::class)->name('admin.updateCharts');
>>>>>>> deea3b07c71f6cd4b20f9d92e9ee7fb75287000c
    Route::resource('users', UserController::class);


    Route::post('/logout', function (Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('toast_success', ' :) به امید دیدار  ');
    })->name('logout');

});*/

Route::middleware(['auth'])->prefix('admin')->group(function () {
<<<<<<< HEAD
    Route::get('/dashboard', \App\Http\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/get-cpudata', [\App\Http\Livewire\Dashboard::class, 'getCpuDataRoute']);
    Route::get('/get-ramdata', [\App\Http\Livewire\Dashboard::class, 'getRamDataRoute']);
    Route::get('/get-diskdata', [\App\Http\Livewire\Dashboard::class, 'getDiskDataRoute']);


    Route::resource('users', UserController::class);
=======
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/get-cpudata', [\App\Livewire\Dashboard::class, 'getCpuDataRoute']);
    Route::get('/get-ramdata', [\App\Livewire\Dashboard::class, 'getRamDataRoute']);
    Route::get('/get-diskdata', [\App\Livewire\Dashboard::class, 'getDiskDataRoute']);


    Route::get('/users', User::class)->name('user');
>>>>>>> deea3b07c71f6cd4b20f9d92e9ee7fb75287000c


    Route::post('/logout', function (Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('toast_success', ' :) به امید دیدار  ');
    })->name('logout');
});

