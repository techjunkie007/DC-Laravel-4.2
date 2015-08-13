<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Routing Empty URL to Login
Route::get('/', function(){
	return Redirect::to('login');
});

//Login Page Route
Route::get('login', array('uses'=>'LoginController@login'));

//Login Submit Credentials Route
Route::post('login', array('uses'=>'LoginController@proceed'));

//Login Page Route
Route::get('dashboard', array('uses'=>'DashboardController@show_menu'));

//Student Info Page
Route::post('student', array('uses'=>'DashboardController@show_student'));

//Datewise Dashboard Route
Route::post('datewise-dashboard', array('uses'=>'DashboardController@datewise_entry'));

//Datewise Register Entry Click Route
Route::post('datewise-register', array('uses'=>'DashboardController@save_entry'));

//Normal Register Entry Click Route
Route::post('register', array('uses'=>'DashboardController@save_entry'));

//New Student Entry Route
Route::post('new-student', array('uses'=>'DashboardController@add_student'));

//Report Panel Route
Route::post('report-panel', array('uses'=>'ReportController@report_menu'));

//Three Entry Report Route
Route::post('three-entry-report', array('uses'=>'ReportController@generate_three_entry_report'));

//Range Report Route
Route::post('range-report', array('uses'=>'ReportController@generate_range_report'));

//Download Report Route
Route::post('download', array('uses'=>'ReportController@download_report'));






//Login Submit Route
//Route::post('login', array('as' => 'submit_login', 'uses' => 'LoginController@proceed'));
//Login Route
//Route::get('login', array('as' => 'login', 'uses' => 'LoginController@login'));
//Dashboard get Route
//Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'DashboardController@show_menu'));
//Date Submit Route
//Route::post('datewise', array('as' => 'date_submit', 'uses' => 'DashboardController@datewise_entry'));
//Route::get('datewise', 'DashboardController@datewise_entry');
//Logout Submit Route
Route::post('logout', array('as' => 'logout_submit', 'uses' => 'LoginController@logout'));
//Student Info Submit Route
//Route::post('dashboard', array('as' => 'dashboard_info', 'uses' => 'DashboardController@store'));
//Register Entry Route
//Route::post('dashboard/entry', array('as' => 'register_entry', 'uses' => 'DashboardController@throw_entry'));
//Datewise Student Info Route
//Route::post('datewise/entry', array('as' => 'datewise_info', 'uses' => 'DashboardController@store'));
//New Datewise Entry Route
//Route::post('datewise', array('as' => 'date_change_submit', 'uses' => 'DashboardController@new_datewise_entry'));
//Back Button Route
//Route::post('dashboard/back', array('as' =>'back_button', 'uses' => 'DashboardController@back_button'));
//Report Button Route
//Route::post('report_menu', array('as' =>'report_submit', 'uses' => 'ReportController@report_menu'));
//Generate Report Route
//Route::post('generate_report', array('as' =>'generate_report', 'uses' => 'ReportController@generate_report'));
//Daily Report Generate
//Route::post('generate_daily_report', array('as'=>'daily_report', 'uses'=>'ReportController@daily_report'));
//Three Entry Report Generate
//Route::post('three_entry_report', array('as'=>'generate_three_entry_report', 'uses'=>'ReportController@three_entry'));
//New Entry Submit 
//Route::post('new_entry', array('as'=>'details_submit', 'uses'=>'DashboardController@new_entry'));
//Download Word Submit 
//Route::post('download_report', array('as'=>'download', 'uses'=>'ReportController@download'));







Route::get('get', function()
{
    var_dump(Session::get('current_user'));
    var_dump(Session::get('entry_date'));
    var_dump(Session::get('student_no'));
    var_dump(Session::get('entry_flag'));

}
);
// Route::controllers([

// 	'auth'=>'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// 	]);



