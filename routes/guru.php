<?php
/**
 * Admin Area
 */
Route::group(['middleware' => ['role:Guru', 'auth']], function () {
    Route::name('guru.')->prefix('/guru')->group(function (){
        Route::get('/dashboard', 'Guru\DashboardController@index')->name('index');
        Route::get('/jadwal/{hari}', 'Guru\DashboardController@hari')->name('jadwal.hari');
    });
});
?>
