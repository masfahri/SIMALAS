<?php

use App\Http\Controllers\Admin\GuruController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\auth\RegisterController;

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


Route::namespace('Auth')->name('auth.')->prefix('auth/')->group(function ()
{
    Route::name('login.')->prefix('login/')->group(function ()
    {
        Route::get('index',[LoginController::class, 'index'])->name('index');
        Route::post('process',[LoginController::class, 'store'])->name('store');
    });
    
    Route::name('register.')->prefix('register/')->group(function ()
    {
        Route::get('/index', [RegisterController::class, 'index'])->name('index');
        Route::get('/proccess', [RegisterController::class, 'store'])->name('store');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

/**
 * Admin Area
 */
Route::group(['middleware' => ['role:Admin']], function () {
    Route::name('admin.')->prefix('/admin')->group(function ()
    {
        /**
         * Master Data Guru
         */
        Route::name('master.')->prefix('/master')->group(function ()
        {
           Route::name('guru.')->prefix('/guru')->group(function ()
           {
                Route::get('/index', [GuruController::class, 'index'])->name('index');
                Route::get('/create', [GuruController::class, 'create'])->name('create');
                Route::get('/edit', [GuruController::class, 'edit'])->name('edit');

                Route::post('/store', [GuruController::class, 'store'])->name('store');
                Route::post('/update', [GuruController::class, 'update'])->name('update');
                Route::post('/delete', [GuruController::class, 'delete'])->name('delete');

                Route::post('/import', [GuruController::class, 'import'])->name('import');
                Route::get('/export', [GuruController::class, 'export'])->name('export');
           });
        });
         
        Route::get('/dashboard', 'Admin\HomeController@index')->name('index');
        

    });
});


