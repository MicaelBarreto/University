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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/courses', 'CourseController@index')->name('courses');

// Everything That Concerns to the Student

Route::get('/student', 'StudentController@index')->name('student');

Route::get('/student/courses', 'CourseController@StudentIndex')->name('student/course');

Route::get('/student/register', 'StudentController@register')->name('student/register');

Route::post('/store', 'StudentController@store')->name('store');

Route::post('/student/update', 'StudentController@update')->name('update');



// Student - Enrollments

Route::get('/enrollment/newly', 'StudentController@enrollmentNew')->name('student/enrollment/new');

Route::get('/student/enrollment', 'StudentController@enrollmentIndex')->name('student/enrollment');

Route::post('/student/enrollments/store', 'StudentController@enrollmentStore')->name('student/enrollmets/store');

Route::get('/student/enrollments/{id}/edit', 'StudentController@enrollmentEdit')->name('admin/enrollments/edit');

Route::post('/student/enrollments/update', 'StudentController@enrollmentUpdate')->name('admin/enrollmets/update');

Route::get('/student/enrollments/{id}/delete', 'StudentController@enrollmentDelete')->name('admin/enrollments/delete');

// -------------------

// ---------------------------------------


// Everything That Concerns to the Admin

Route::middleware(['auth', 'is_admin'])->group(function () {

    Route::get('/admin/students', 'AdminController@studentIndex')->name('admin/students');

    

    Route::get('/admin', function () {
        return view('/admin.index');
    });


    // Admin - User

    Route::get('/admin/user', 'AdminController@userIndex')->name('admin/users');

    Route::get('/user/{id}/permission', 'AdminController@userAuthorize')->name('admin/users/permit');

    Route::get('/user/{id}/delete', 'AdminController@userDelete')->name('admin/users/delete');


    //-------------

    // Admin - Courses

    Route::get('/admin/courses', 'AdminController@courseIndex')->name('admin/courses');

    Route::post('/course/store', 'AdminController@courseStore')->name('admin/courses/store');

    Route::get('/courses/{id}/edit', 'AdminController@courseEdit')->name('admin/courses/edit');

    Route::get('/courses/{id}/delete', 'AdminController@courseDelete')->name('admin/courses/delete');

    Route::post('/course/update', 'AdminController@courseUpdate')->name('admin/courses/update');

    Route::get('/courses/new', function () {
        return view('/admin/courses.new');
    })->name('admin/courses/new');


    // --------------


    // Admin - Enrollments


    Route::get('/enrollments/{id}/authorization', 'AdminController@enrollmentAuthorize')->name('admin/enrollments/authorize');

    Route::get('/admin/enrollment', 'AdminController@enrollmentIndex')->name('admin/enrollments');

    Route::get('/enrollments/new', 'AdminController@enrollmentNew')->name('admin/enrollments/new');

    Route::get('/enrollments/{id}/edit', 'AdminController@enrollmentEdit')->name('admin/enrollments/edit');

    Route::get('/enrollments/{id}/delete', 'AdminController@enrollmentDelete')->name('admin/enrollments/delete');

    Route::post('/admin/enrollments/store', 'AdminController@enrollmentStore')->name('admin/enrollmets/store');

    Route::post('/admin/enrollments/update', 'AdminController@enrollmentUpdate')->name('admin/enrollmets/update');

});

//-------------------

// ----------------------------------------