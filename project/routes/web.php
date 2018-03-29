<?php


use App\EmployeeInfo;

Route::get('/sector/create','SectorController@index');
Route::get('/sector/show','SectorController@show');
Route::get('/sector/edit/{id}','SectorController@showEdit');
Route::post('/sector/edit','SectorController@edit');
Route::post('/sector/delete/{id}','SectorController@delete');
Route::post('/savesector','SectorController@store');

Route::get('/subsector/create','SubsectorController@index');
Route::get('/subsector/show','SubsectorController@show');
Route::get('/subsector/edit/{id}','SubsectorController@showEdit');
Route::post('/subsector/edit','SubsectorController@edit');
Route::post('/subsector/delete/{id}','SubsectorController@delete');
Route::post('/savesubsector','SubsectorController@store');

Route::get('/region/create','RegionController@index');
Route::get('/region/show','RegionController@show');
Route::get('/region/edit/{id}','RegionController@showEdit');
Route::post('/region/edit','RegionController@edit');
Route::post('/region/delete/{id}','RegionController@delete');
Route::post('/saveregion','RegionController@store');

Route::get('/package/create','PackageController@index');
Route::get('/package/show','PackageController@show');
Route::get('/package/edit/{id}','PackageController@showEdit');
Route::post('/package/edit','PackageController@edit');
Route::post('/package/delete/{id}','PackageController@delete');
Route::post('/savepackage','PackageController@store');


Route::get('/os/create','OccupationalStandardController@index');
Route::get('/os/show','OccupationalStandardController@show');
Route::get('/os/edit/{id}','OccupationalStandardController@showEdit');
Route::post('/os/edit','OccupationalStandardController@edit');
Route::post('/os/delete/{id}','OccupationalStandardController@delete');
Route::post('/saveos','OccupationalStandardController@store');


Route::get('/level/create','LevelController@index');
Route::get('/level/show','LevelController@show');
Route::get('/level/edit/{id}','LevelController@showEdit');
Route::post('/level/edit','LevelController@edit');
Route::post('/level/delete/{id}','LevelController@delete');
Route::post('/savelevel','LevelController@store');


Route::get('/assesor/create','AssesorController@index');
Route::get('/assesor/show','AssesorController@show');
Route::get('/assesor/edit/{id}','AssesorController@showEdit');
Route::post('/assesor/edit','AssesorController@edit');
Route::post('/assesor/delete/{id}','AssesorController@delete');
Route::post('/saveassesor','AssesorController@store');


Route::get('/item/create','ItemDocController@index');
Route::get('/item/show','ItemDocController@show');
Route::get('/item/edit/{id}','ItemDocController@showEdit');
Route::post('/item/edit','ItemDocController@edit');
Route::post('/item/delete/{id}','ItemDocController@delete');
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
Route::get('/get_sector_id/{id}','OpenPackageController@getSectorName');
Route::get('/get_subsector_id/{id}','OpenPackageController@getSubsectorName');
Route::get('/get_os_id/{id}','OpenPackageController@getOsName');
Route::get('/get_level_id/{id}','OpenPackageController@getLevelName');
Route::get('/get_region_id/{id}','OpenPackageController@getRegionName');
Route::get('/get_package_id/{id}','OpenPackageController@getPackageName');



Route::get('/post_package','PostPackageController@index');
Route::post('/post_package','PostPackageController@store');
Route::get('/download_for_post/{opened_package_id}','PostPackageController@download');
Route::post('/post','PostPackageInfoController@store');

Route::get('/get_open_package_id/{id}','PostPackageController@getPackageName');

Route::get('/approve_package','ApproveController@index');
Route::post('/approve_package','ApproveController@store');
Route::get('/download_for_approve/{post_package_id}','ApproveController@download');
Route::post('/approve','ApproveController@storeStat');

Route::get('/get_post_package_id/{id}','ApproveController@getPackageName');

Route::get('/input_user','EmployeeInfoController@index');
Route::post('/input_user','EmployeeInfoController@store');
Route::get('/user_stat',function () {
    $employee=EmployeeInfo::all();

    return view('admin.transactions.user_status')->with(compact('employee'));
});
Route::get('get_emp_info/{id}','EmployeeInfoController@details');
Route::post('/update_status','EmployeeInfoController@updateStat');

Route::get('/user_permissions','UserControlPermissionController@index');
Route::post('/user_permission','UserControlPermissionController@store');

Route::get('/login','SessionController@index');
Route::post('/login','SessionController@store');
Route::get('/logout','SessionController@destroy');
Route::get('/changepassword','SessionController@showPassword');
Route::get('/cancel',function(){
    return redirect('/');
});

Route::get('/', function () {
    return view('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Report Routes
//View Routers for summaries
Route::group(['namespace' => 'ViewController'], function() {
    //Sector Section
    Route::group(['prefix' => 'summary'], function() {
        Route::get('/sector', 'SummaryController@sector');
        Route::get('/subsector', 'SummaryController@subSector');
        Route::get('/occupationstd', 'SummaryController@occupationStd');
        Route::get('/level', 'SummaryController@level');
        Route::get('/region', 'SummaryController@region');
        Route::get('/item', 'SummaryController@item');
        Route::get('/package', 'SummaryController@package');
        Route::get('/assessor', 'SummaryController@assessor');
        Route::get('/created-package', 'SummaryController@createdPackage');
        Route::get('/opened-package', 'SummaryController@openedPackage');
        Route::get('/posted-package', 'SummaryController@postedPackage');
        Route::get('/approve-package', 'SummaryController@approvedPackage');
        Route::get('/user-summary','SummaryController@userSummary');
        Route::get('/user-stat-summary','SummaryController@userStatSummary');
        Route::get('/user-permission','SummaryController@userPermissionSummary');
    });
});

//Logic Router for summaries
Route::group(['namespace' => 'LogicController'], function() {
    //Sector Logic Controller
    Route::group(['prefix' => 'summary'], function() {
        Route::get('/sector/getsector/{id}', 'SummaryController@getSector');
        Route::get('/subsector/getsubsector/{id}', 'SummaryController@getSubSector');
        Route::get('/occupationstd/get-occupation-std/{id}', 'SummaryController@getOccupationStd');
        Route::get('/level/get-level/{id}', 'SummaryController@getLevel');
        Route::get('/region/get-region/{id}', 'SummaryController@getRegion');
        Route::get('/item/get-item/{id}', 'SummaryController@getItem');
        Route::get('/package/get-package/{id}', 'SummaryController@getPackage');
        Route::get('/assessor/get-assessor/{id}', 'SummaryController@getAssessor');
        Route::get('/created-package/get-package/{id}/{date_from?}/{date_to?}',
            'SummaryController@getCreatedPackage');
        Route::get('/opened-package/get-package/{id}/{date_from?}/{date_to?}',
            'SummaryController@getOpenedPackage');
        Route::get('/posted-package/get-package/{id}/{date_from?}/{date_to?}',
            'SummaryController@getPostedPackage');
        Route::get('/approve-package/get-package/{id}/{date_from?}/{date_to?}',
            'SummaryController@getApprovedPackage');
        Route::get('/user-summary/get-user/{id}/{date_from?}/{date_to?}',
            'SummaryController@getUsers');
        Route::get('/user-stat-summary/get-user/{id}/{status?}',
            'SummaryController@getUserStat');
        Route::get('/user-permission-summary/get-user/{id}/{maintenance?}/{transaction?}/{report?}',
            'SummaryController@getUserPermission');
    });
});

