<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/trainings', 'TrainingController@index')->name('trainings')->middleware('auth');;
Route::get('/applications', 'ApplicationController@index')->name('applications')->middleware('auth');;

Route::get('/newApplication', 'ApplicationController@store')->name('newApplication')->middleware('auth');;
Route::get('/newTraining', 'TrainingController@store')->name('newTraining')->middleware('auth');;
Route::get('/newTraining', 'TrainingController@store')->name('newSurveyAnswer')->middleware('auth');;

Route::get('/profile', 'ApplicationController@profile')->name('profile')->middleware('auth');;

Route::get('/surveys', 'SurveyController@index')->name('surveys')->middleware('auth');;

Route::get('/searchTraining', 'TrainingController@search')->name('searchTraining')->middleware('auth');;

Route::resource('application', 'ApplicationController')->middleware('auth');;
Route::resource('training', 'TrainingController')->middleware('auth');;
Route::resource('survey', 'SurveyController')->middleware('auth');;
Route::resource('Result', 'ResultController')->middleware('auth');;


Route::get('/studentMail', 'MailController@studentenMail');


Route::resource('test', 'TestController');