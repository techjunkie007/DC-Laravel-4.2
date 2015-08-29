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

//Dashboard Page GET Route
Route::get('dashboard', array('uses'=>'DashboardController@show_menu'));

//Dashboard Page POST Route
Route::post('dashboard', array('uses'=>'DashboardController@back_button'));

//Student Info Page
Route::get('student', array('uses'=>'DashboardController@show_student'));

//Datewise Dashboard Route
Route::get('datewise-dashboard', array('uses'=>'DashboardController@datewise_entry'));

//Datewise Register Entry Click Route
Route::get('datewise-register', array('uses'=>'DashboardController@save_entry'));

//Normal Register Entry Click Route
Route::get('register', array('uses'=>'DashboardController@save_entry'));

//New Student Entry Route
Route::get('new-student', array('uses'=>'DashboardController@add_student'));

//Report Panel Route
Route::get('report-panel', array('uses'=>'ReportController@report_menu'));

//Three Entry Report Route
Route::get('three-entry-report', array('uses'=>'ReportController@generate_three_entry_report'));

//Range Report Route
Route::get('range-report', array('uses'=>'ReportController@generate_range_report'));

//Daily Report Route
Route::get('daily-report', array('uses'=>'ReportController@generate_daily_report'));

//Download Report Route
Route::get('download_three', array('uses'=>'ReportController@download_three_entry_report'));

//Download Report Route
Route::get('download_daily', array('uses'=>'ReportController@download_daily_report'));

//Download Report Route
Route::get('download_range', array('uses'=>'ReportController@download_range_report'));

//Logout Route
Route::post('logout', array('as'=>'logout_submit', 'uses'=>'LoginController@logout'));

//Datewise Again Entry Route
Route::get('datewise_again', function(){
	return View::make('datewise');
});







Route::get('get', function()
{
    var_dump(Session::get('current_user'));
    var_dump(Session::get('entry_date'));
    var_dump(Session::get('student_no'));
    var_dump(Session::get('entry_flag'));
    var_dump(Session::get('daily_date'));
    var_dump(Session::get('branch'));



}
);
// Route::controllers([

// 	'auth'=>'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// 	]);



