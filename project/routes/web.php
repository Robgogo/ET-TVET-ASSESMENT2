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

Route::get('/create_package','CreatePackageController@index');
//the route below is the code that is responsible to get therequest from ajax and 
//process it and return the values needed
Route::get('/get_package_id/{pack_no}','CreatePackageController@getId');
Route::post('/creatpackages','CreatePackageController@store');

Route::get('/open_package','OpenPackageController@index');
Route::post('/open_package','OpenPackageController@store');
Route::get('/download/{created_package_id}','OpenPackageController@download');
Route::post('/open','OpenedPackageInfoController@store');

Route::get('/post_package','PostPackageController@index');
Route::post('/post_package','PostPackageController@store');
Route::get('/download_for_post/{opened_package_id}','PostPackageController@download');
Route::post('/post','PostPackageInfoController@store');

Route::get('/approve_package','ApproveController@index');
Route::post('/approve_package','ApproveController@store');
Route::get('/download_for_approve/{post_package_id}','ApproveController@download');
Route::post('/post','ApproveController@storeStat');

Route::get('/input_user','InputUser@index');
Route::post('/input_user', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});
