<?php




Route::get('/sector','SectorController@index');
Route::post('/savesector','SectorController@store');

Route::get('/subsector','SubsectorController@index');
Route::post('/savesubsector','SubsectorController@store');

Route::get('/region','RegionController@index');
Route::post('/saveregion','RegionController@store');

Route::get('/os','OccupationalStandardController@index');
Route::post('/saveos','OccupationalStandardController@store');

Route::get('/level','LevelController@index');
Route::post('/savelevel','LevelController@store');

Route::get('/assesor','AssesorController@index');
Route::post('/saveassesor','AssesorController@store');

Route::get('/package','PackageController@index');
Route::post('/savepackage','PackageController@store');

Route::get('/item','ItemDocController@index');
Route::post('/saveitem','ItemDocController@store');


Route::get('/', function () {
    return view('welcome');
});
