<?php
/**
 * Admin Area
 */
Route::group(['middleware' => ['role:Guru', 'auth']], function () {
    Route::name('guru.')->prefix('/guru')->group(function (){
        Route::get('/dashboard', 'Guru\DashboardController@index')->name('index');
        Route::get('/jadwal/{hari}', 'Guru\DashboardController@hari')->name('jadwal.hari');

        Route::name('materi.')->prefix('/materi')->group(function (){
            Route::get('/index', 'Guru\MateriController@index')->name('index');
            Route::get('/show/{kd_kelas}/{kd_guru_mapel}', 'Guru\MateriController@show')->name('show');
            Route::post('/store', 'Guru\MateriController@store')->name('store');
            Route::get('/edit/{id}', 'Guru\MateriController@edit')->name('edit');
            Route::put('/update', 'Guru\MateriController@update')->name('update');
            Route::delete('/delete/{id}', 'Guru\MateriController@destroy')->name('destroy');
        });
    });
});
?>
