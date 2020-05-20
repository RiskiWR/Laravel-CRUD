<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::middleware('auth')->group(function () {
        Route::get('/', 'HomeController@index')->name('welcome');
        Route::get('/home', 'HomeController@index')->name('home');

        // Student
        Route::get('/student/trash', 'StudentController@trash')->name('student.trash');
        Route::get('/student/restore/{id}', 'StudentController@restore')->name('student.restore');
        Route::get('/student/restore_all', 'StudentController@restore_all')->name('student.restore_all');
        Route::delete('/student/kill/{id}', 'StudentController@kill')->name('student.kill');
        Route::delete('/student/kill_all', 'StudentController@kill_all')->name('student.kill_all');
        Route::get('/student/search', 'StudentController@search')->name('student.search');
        Route::get('/student/filter', 'StudentController@filter')->name('student.filter');
        Route::get('/student/print', 'StudentController@print')->name('student.print');
        Route::get('/student/pdf', 'StudentController@pdf')->name('student.pdf');
        Route::get('/student/excel', 'StudentController@excel')->name('student.excel');
        Route::resource('/student', 'StudentController');

        // Major
        Route::get('/major/search', 'MajorController@search')->name('major.search');
        Route::resource('/major','MajorController');

        // Grade
        Route::get('/grade/search', 'GradeController@search')->name('grade.search');
        Route::resource('/grade', 'GradeController');
        
        // Hobby
        Route::get('/hobby/search', 'HobbyController@search')->name('hobby.search');
        Route::resource('/hobby', 'HobbyController');



});







Auth::routes();


