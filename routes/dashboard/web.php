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

    Route::get('/admin',function(){
        return view('layouts/dashboard/app');
    })->middleware(['role:admin|super_admin']);
    Route::get('profile/{id}','Dashboard\UserController@showProfile')->name('dashboard.showUserProfile');
    Route::put('profile/{user}','Dashboard\UserController@updateProfile')->name('update_profile');
    Route::get('editProfile/{user}','Dashboard\UserController@showEditProfileForm')->name('show_Profile_Form');
    Route::get('/users','Dashboard\UserController@index')->name('users');
    Route::get('/users/{user}','Dashboard\UserController@edit')->name('edit_user');
    Route::post('/users','Dashboard\UserController@searchUser')->name('searchForUser');
    Route::get('/users/{id}/{name}','Dashboard\UserController@delete')->name('delete_user');
    Route::put('/users/{user}','Dashboard\UserController@update')->name('update_user');
    Route::get('/addUserByAdmin','Dashboard\UserController@showAddingForm')->name('showForm');
    Route::post('/users/add','Dashboard\UserController@addUser')->name('add_user');
    Route::resource('pages','Dashboard\PageController');
    Route::resource('videos','Dashboard\VideoController');
    Route::resource('audios','Dashboard\AudioController');
    Route::get('/pages/{page}','Dashboard\PageController@showPage')->name('showPost');
    Route::get('/videos/{video}','Dashboard\videoController@showVideo')->name('showVideoPage');
    Route::get('/podcasts','Dashboard\audioController@showAudios')->name('showAudiosPage');
    Route::get('/podcasts/{audio}','Dashboard\audioController@showAudio')->name('showSingleAudio');
    Route::post('/videos/{video}','Dashboard\CommentController@saveVideoComment')->name('saveVideoComment');
    Route::post('/podcasts/{audio}','Dashboard\CommentController@saveAudioComment')->name('saveAudioComment');
    Route::post('/pages/{page}','Dashboard\CommentController@savePostComment')->name('savePostComment');
    Route::get('/searchPage','Dashboard\PageController@searchPages')->name('live-search-page');
    Route::get('/searchAudio','Dashboard\AudioController@searchAudios')->name('live-search-audio');
    Route::get('/searchVideo','Dashboard\VideoController@searchVideos')->name('live-search-video');
    Route::get('/notifications/{type}/{id}/{objectId}/{notyId}','Dashboard\NotificationController@showNotificationInfo')->name('showInfo');
    Route::get('/notification/{checkType}/{objecType}/{id}/{notyId}','Dashboard\NotificationController@handleNotification')->name('handleNoty');
    Route::get('/categories','CategoryController@index')->name('showCategories');
    Route::get('/categories/create','CategoryController@create')->name('createCategory');
    Route::post('/categories/store','CategoryController@store')->name('storeCategory');
    Route::get('/categories/{category}','CategoryController@edit')->name('editCategory');
    Route::put('/categories/{category}','CategoryController@update')->name('updateCategory');
    Route::get('/categories/{id}/{name}','CategoryController@delete')->name('deleteCategory');
    
    
    
    
    //Route::get('/searchPage','Dashboard\PageController@searchPages');

// Route::get('/', function () {
//     return view('welcome');
// });->middleware(['role:super_admin'])

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
