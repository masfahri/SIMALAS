<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\MappingController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\Admin\SubKelasController;
use App\Http\Controllers\Admin\MappingMapelController;
use App\Http\Controllers\Admin\MataPelajaranController;

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
Route::group(['middleware' => ['role:Admin', 'auth']], function () {
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
                Route::get('/edit/{kd_guru}', [GuruController::class, 'edit'])->name('edit');

                Route::post('/store', [GuruController::class, 'store'])->name('store');
                Route::post('/update/{kd_guru}', [GuruController::class, 'update'])->name('update');
                Route::delete('/delete/{kd_guru}', [GuruController::class, 'destroy'])->name('delete');

                Route::post('/import', [GuruController::class, 'import'])->name('import');
                Route::get('/export', [GuruController::class, 'export'])->name('export');
            });
            Route::name('kelas.')->prefix('/kelas')->group(function ()
            {
                Route::get('/index', [KelasController::class, 'index'])->name('index');
                Route::get('/create', [KelasController::class, 'create'])->name('create');
                Route::get('/edit/{kd_kelas}', [KelasController::class, 'edit'])->name('edit');

                Route::post('/store', [KelasController::class, 'store'])->name('store');
                Route::post('/update/{kd_kelas}', [KelasController::class, 'update'])->name('update');
                Route::delete('/delete/{kd_kelas}', [KelasController::class, 'destroy'])->name('delete');
            });
            Route::name('subkelas.')->prefix('/subkelas')->group(function ()
            {
                Route::get('/index', [SubKelasController::class, 'index'])->name('index');
                Route::get('/create', [SubKelasController::class, 'create'])->name('create');
                Route::get('/edit/{kd_sub_kelas}', [SubKelasController::class, 'edit'])->name('edit');

                Route::post('/store', [SubKelasController::class, 'store'])->name('store');
                Route::post('/update/{kd_sub_kelas}', [SubKelasController::class, 'update'])->name('update');
                Route::delete('/delete/{kd_sub_kelas}', [SubKelasController::class, 'destroy'])->name('delete');
            });
            Route::name('jurusan.')->prefix('/jurusan')->group(function ()
            {
                Route::get('/index', [JurusanController::class, 'index'])->name('index');
                Route::get('/create', [JurusanController::class, 'create'])->name('create');
                Route::get('/edit/{kd_jurusan}', [JurusanController::class, 'edit'])->name('edit');

                Route::post('/store', [JurusanController::class, 'store'])->name('store');
                Route::post('/update/{kd_jurusan}', [JurusanController::class, 'update'])->name('update');
                Route::delete('/delete/{kd_jurusan}', [JurusanController::class, 'destroy'])->name('delete');
            });

            // Siswa CRUD
            Route::name('siswa.')->prefix('/siswa')->group(function ()
            {
                Route::get('/index', [SiswaController::class, 'index'])->name('index');
                Route::get('/create', [SiswaController::class, 'create'])->name('create');
                Route::get('/edit/{kd_guru}', [SiswaController::class, 'edit'])->name('edit');

                Route::post('/store', [SiswaController::class, 'store'])->name('store');
                Route::post('/update/{kd_guru}', [SiswaController::class, 'update'])->name('update');
                Route::delete('/delete/{kd_guru}', [SiswaController::class, 'destroy'])->name('delete');

                Route::post('/import', [SiswaController::class, 'import'])->name('import');
                Route::get('/export', [SiswaController::class, 'export'])->name('export');

                Route::name('mapping.')->prefix('/mapping')->group(function ()
                {
                    Route::get('/mapping-siswa-to-class/{kd_kelas}', [MappingController::class, 'index'])->name('index');
                    Route::post('/mapping-siswa-to-class', [MappingController::class, 'store'])->name('store');
                    Route::put('/mapping-siswa-to-class', [MappingController::class, 'update'])->name('update');
                    Route::delete('/mapping-siswa-to-class/{kd_kelas}', [MappingController::class, 'destroy'])->name('delete');
                });

            });

            Route::name('mapel.')->prefix('/mapel')->group(function ()
            {
                Route::get('/index', [MataPelajaranController::class, 'index'])->name('index');
                Route::get('/create', [MataPelajaranController::class, 'create'])->name('create');
                Route::get('/edit/{kd_guru}', [MataPelajaranController::class, 'edit'])->name('edit');

                Route::post('/store', [MataPelajaranController::class, 'store'])->name('store');
                Route::post('/update', [MataPelajaranController::class, 'update'])->name('update');
                Route::delete('/delete/{kd_guru}', [MataPelajaranController::class, 'destroy'])->name('delete');

                Route::name('mapping.')->prefix('/mapping')->group(function ()
                {
                    Route::get('/mapping-guru-to-mapel/{kd_kelas}', [MappingMapelController::class, 'index'])->name('index');
                    Route::post('/mapping-guru-to-mapel', [MappingMapelController::class, 'store'])->name('store');
                    Route::put('/mapping-guru-to-mapel', [MappingMapelController::class, 'update'])->name('update');
                    Route::delete('/mapping-guru-to-mapel/{id}', [MappingMapelController::class, 'destroy'])->name('delete');
                });
            });

<<<<<<< HEAD
            Route::name('jadwal.')->prefix('/jadwal')->group(function ()
            {
               Route::get('/{any}', [JadwalController::class, 'index'])->name('index')->where('any', '*');
            });

=======
>>>>>>> parent of 0963fce... module jadwal start
        });
         
        Route::get('/dashboard', 'Admin\HomeController@index')->name('index');

        Route::get('/clear-cahce', function ()
        {
           Artisan::call('cache:clear');
        });
        

    });
});


