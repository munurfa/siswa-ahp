<?php


Route::get('/', function () {
    return view('welcome');
});
Route::get('/proses-ahp', 'AhpController@index')->name('proses-ahp');

Route::resource('siswa', 'SiswaController');
Route::get('/saring-siswa', 'SiswaController@saringSiswa')->name('saring-siswa');
Route::post('/saring', 'SiswaController@saring')->name('saring');
Route::auth();

Route::get('/home', 'HomeController@index');
