<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/auth/check', 'HomeController@checkAuth');

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('category/{category}/courses', 'HomeController@courses_by_category')->name('courses_by_category');
Route::get('courses/{course}', 'HomeController@course_detail')->name('course_detail');

// cart
Route::get('my-carts', 'CartController@carts')->name('carts.all');
Route::post('cart/add', 'CartController@add')->name('cart.add');
Route::post('cart/remove/{id}', 'CartController@remove')->name('cart.remove');

// enroll
Route::get('enroll', 'EnrollController@enroll')->name('enroll');

// users
Route::group(['middleware' => 'auth'], function () {
    Route::get('my_courses', 'UserController@courses')->name('user.courses');
    Route::get('my_courses/{course}/lesson/{id}', 'UserController@lesson')->name('user.courses.lessons');

    // profile
    Route::group(['prefix' => 'profile'], function () {
        Route::get('', 'UserController@user_profile')->name('user.profile');
        Route::post('', 'UserController@user_profile_update')->name('user.profile.update');

        Route::view('credentials', 'users.user-credentials')->name('user.credentials');
        Route::post('credentials', 'UserController@user_credentials_update')->name('user.credentials.update');

        Route::view('photo', 'users.user-photo')->name('user.photo');
        Route::post('photo', 'UserController@user_photo_update')->name('user.photo.update');
    });

    // review
    Route::post('review', 'ReviewController@review')->name('add.review');
});

//search
Route::any('/search', 'SearchController@search')->name('search');

//Lecturer Routes
Route::namespace('Lecturers')->prefix('lecturers')->group(function(){
	//Route::get('/', 'HomeController@index')->name('lecturers.home');
	Route::namespace('Auth')->group(function(){
        Route::get('/home', 'HomeController@index')->name('lecturers.home');
		Route::get('/loginform', 'LoginController@showLoginForm')->name('lecturers.login');
		Route::post('/login', 'LoginController@login')->name('lecturer.login');
		Route::post('logout', 'LoginController@logout')->name('lecturers.logout');
	});   
});

//User Routes
Route::namespace('Users')->prefix('users')->group(function(){
	//Route::get('/', 'HomeController@index')->name('lecturers.home');
	Route::namespace('Auth')->group(function(){
        // Route::get('/', 'HomeController@index')->name('users.home');
        // Route::match(array('GET','POST'),'/login', 'LoginController@login')->name('login');
		Route::post('/login', 'LoginController@login')->name('login');
        Route::post('/register', 'RegisterController@register')->name('users.register');
		Route::post('logout', 'LoginController@logout')->name('logout');

	});
});

//Lesson Upload Controller
Route::group(['prefix' => 'lecturers', 'as' => 'lecturers.'], function () {
Route::resource('lessons','CourseUploadController')->name('*','lesson');
});
//Route::post('lessons/store','CourseUploadController@store')->name('lesson.store');
// Route::post('lecturer/lessons/index','CourseUploadController@index')->name('lesson.index');


//Payment Route(Payfast)
// Route::any('payment', 'PaymentController@confirmPayment')->name('confirmPayment');


// // user protected routes
// Route::group(['middleware' => ['auth', 'user'], 'prefix' => 'user'], function () {
//     Route::get('/', 'HomeController@index')->name('home');
// });

// // teacher protected routes
// Route::group(['middleware' => ['auth', 'teacher'], 'prefix' => 'teacher'], function () {
//     Route::get('/', 'HomeController@index')->name('welcome');

// });
