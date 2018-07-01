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

Route::get('/courses', 'CourseController@index')->name('courses');

Route::get('/student', 'StudentController@index')->name('student');

Route::get('/student/courses', 'CourseController@StudentIndex')->name('student/course');

Route::get('/student/register', 'StudentController@register')->name('student/register');

Route::post('/store', 'StudentController@store')->name('store');

Route::post('/student/update', 'StudentController@update')->name('update');

Route::get('/admin/courses', 'AdminController@courseIndex')->name('admin/courses');

Route::get('/admin/students', 'AdminController@studentIndex')->name('admin/students');

Route::post('/course/store', 'AdminController@courseStore')->name('admin/courses/store');

Route::get('/courses/{id}/edit', 'AdminController@courseEdit')->name('admin/courses/edit');

Route::get('/courses/{id}/delete', 'AdminController@courseDelete')->name('admin/courses/delete');

Route::get('/enrollments/{id}/authorize', 'AdminController@enrollmentAuthozire')->name('admin/enrollments/authorize');

Route::get('/admin/enrollment', 'AdminController@enrollmentIndex')->name('admin/enrollments');

Route::post('/course/update', 'AdminController@courseUpdate')->name('admin/courses/update');

Route::get('/enrollments/new', 'AdminController@enrollmentNew')->name('admin/enrollments/new');

Route::get('/enrollments/{id}/edit', 'AdminController@enrollmentEdit')->name('admin/enrollments/edit');

Route::get('/enrollments/{id}/delete', 'AdminController@enrollmentDelete')->name('admin/enrollments/delete');

Route::post('/admin/enrollments/store', 'AdminController@enrollmentStore')->name('admin/enrollmets/store');

Route::post('/admin/enrollments/update', 'AdminController@enrollmentUpdate')->name('admin/enrollmets/update');

Route::get('/admin', function () {
    return view('/admin.index');
});

Route::get('/courses/new', function () {
    return view('/admin/courses.new');
})->name('admin/courses/new');

// Route::get('/enrollments/new', function () {
//     return view('/admin/enrollments.new');
// })->name('admin/enrollmentss/new');

