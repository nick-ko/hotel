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

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@home'
]);

Route::get('/about', [
    'as' => 'about',
    'uses' => 'HomeController@about'
]);

Route::get('/room', [
    'as' => 'room',
    'uses' => 'HomeController@room'
]);

Route::get('/event', [
    'as' => 'event',
    'uses' => 'HomeController@event'
]);

Route::get('/service', [
    'as' => 'service',
    'uses' => 'HomeController@service'
]);

Route::get('/contact', [
    'as' => 'contact',
    'uses' => 'HomeController@contact'
]);

Route::get('/gallery', [
    'as' => 'gallery',
    'uses' => 'HomeController@gallery'
]);

Route::post('/contact-us', [
    'uses' => 'HomeController@contact_us'
]);

Route::get('/downloadExcel', 'BookController@downloadExcel');

Route::post('/searching', [
    'as' => 'searching',
    'uses' => 'RoomController@search'
]);

Route::post('/searching-event', [
    'uses' => 'EventController@search'
]);

Route::get('/event-type/{type}', [
    'as' => 'details',
    'uses' => 'EventController@event_type'
]);

Route::get('/room-details/{id}', [
    'as' => 'details',
    'uses' => 'RoomController@details'
]);

Route::post('/dashboard/booking', [
    'as' => 'booking',
    'uses' => 'BookController@save'
]);

Route::post('/dashboard/backend-booking', [
    'as' => 'booking',
    'uses' => 'BookController@backend_save'
]);

Route::post('/dashboard/save-booking', [
    'uses' => 'BookController@booking'
]);

Route::post('/dashboard/backend-save-booking', [
    'uses' => 'BookController@backend_booking'
]);
Route::get('/blog', [
    'as' => 'blog',
    'uses' => 'HomeController@blog'
]);
Route::get('/blog/article/{id}', [
    'as' => 'article',
    'uses' => 'BlogController@show'
]);

Route::post('/blog/article/comment', [
    'uses' => 'BlogController@comment'
]);
Route::post('/blog/article/search', [
    'uses' => 'BlogController@search'
]);


//admin root

Route::middleware(['auth'])->group(function () {
    Route::get('/dash', [
            'as' => 'dash',
            'uses' => 'BackendController@dash'
    ]);

    Route::get('/logout', [
        'as' => 'logout',
        'uses' => 'BackendController@logout'
    ]);
    Route::get('/dashboard/category', [
        'as' => 'category',
        'uses' => 'BackendController@category'
    ]);
    Route::get('/dashboard/room', [
        'as' => 'dashroom',
        'uses' => 'BackendController@room'
    ]);
    Route::post('/dashboard/add-category', [
        'as' => 'add.category',
        'uses' => 'CategoryController@add'
    ]);

    Route::post('/dashboard/add-room', [
        'as' => 'add.room',
        'uses' => 'RoomController@add'
    ]);

    Route::get('/dashboard/stats', [
        'as' => 'stats',
        'uses' => 'StatController@stats'
    ]);

    Route::get('/dashboard/booking', [
        'as' => 'book',
        'uses' => 'BookController@book'
    ]);
    Route::get('/dashboard/delete-room/{id}', [
        'uses' => 'RoomController@delete',
        'as' => 'delete.room'
    ]);
    Route::get('/dashboard/delete-category/{id}', [
        'uses' => 'CategoryController@delete',
        'as' => 'delete.category'
    ]);
    Route::get('/dashboard/delete-book/{id}', [
        'uses' => 'BookController@delete',
        'as' => 'delete.room'
    ]);
    Route::get('/dashboard/confirm-book/{id}', [
        'uses' => 'BookController@confirm',
        'as' => 'confirm'
    ]);
    Route::get('/dashboard/disponibility-room/{id}', [
        'uses' => 'RoomController@disponibility'
    ]);

    Route::get('/dashboard/event', [
        'as' => 'dash.event',
        'uses' => 'EventController@event'
    ]);
    Route::post('/dashboard/add-event', [
        'as' => 'add.event',
        'uses' => 'EventController@add'
    ]);
    Route::get('/dashboard/users', [
        'as' => 'users',
        'uses' => 'BackendController@user'
    ]);
    Route::post('/dashboard/add-users', [
        'uses' => 'BackendController@create'
    ]);
    Route::get('/dashboard/profile', [
        'as' => 'profile',
        'uses' => 'BackendController@profile'
    ]);

    Route::get('/dashboard/about', [
        'as' => 'dash.about',
        'uses' => 'BackendController@about'
    ]);

    Route::get('/dashboard/gallery', [
        'as' => 'dash.gallery',
        'uses' => 'BackendController@gallery'
    ]);
    Route::post('/gallery/save-image', [
        'uses' => 'BackendController@save'
    ]);

    Route::get('/dashboard/add-article', [
        'as' => 'add.article',
        'uses' => 'BlogController@create'
    ]);
    Route::post('/dashboard/save-article', [
        'uses' => 'BlogController@store'
    ]);
    Route::get('/dashboard/blog', [
        'as' => 'dash.blog',
        'uses' => 'BlogController@index'
    ]);
    Route::post('/dashboard/save-home', [
        'uses' => 'WebController@store_home'
    ]);
    Route::post('/dashboard/save-about', [
        'uses' => 'WebController@store_about'
    ]);

    //web

    Route::get('/dashboard/home', [
        'as' => 'dash.home',
        'uses' => 'WebController@home'
    ]);
    Route::get('/dashboard/about', [
        'as' => 'dash.about',
        'uses' => 'WebController@about'
    ]);




});

Auth::routes();

//Route::get('/home', 'BackendController@index')->name('home');
