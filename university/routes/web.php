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

Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');

Route::get('/courses', 'CourseController@index')->name('courses');

Route::get('/student', 'StudentController@index')->name('student');

Route::get('/student/courses', 'CourseController@StudentIndex')->name('student/course');

Route::get('/student/register', 'StudentController@register')->name('student/register');

Route::post('/store', 'StudentController@store')->name('store');

//Route::get('/student/edit', 'StudentController@edit')->name('edit');

Route::post('/student/update', 'StudentController@update')->name('update');

//Route::get('/student/register', function () {
 //   return view('/student.register');
//});

