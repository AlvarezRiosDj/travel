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



Route::get('mifuncion','PublicController@mifuncion');












Route::get('/', function () {
    return view('welcome');
});



/** Rutas Administrativas */

// Route::namespace('')->group(function () {
//     // Controllers Within The "App\Http\Controllers\Admin" Namespace
//     Route::get('','AdminController@index');
// });





// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::get('/','AdminController@index');

//     Route::resource('users', 'UserController')->name('users'); 
//     // Route::name('users.')->group(function(){
//     //   Route::resource('users', 'UserController');  
//     // });

//         Route::prefix('users')->name('users.')->group(function(){
//             Route::resource('users', 'UserController'); 
//         });
    
    
//     Route::resource('groups','GroupController');
// });


Route::prefix('admin')->group(function(){
   Route::resource('users', 'UserController',['as' => 'admin']); 
   Route::resource('groups','GroupController',['as'=> 'admin']);
   Route::resource('languages','LanguageController',['as'=> 'admin']);
   Route::resource('categories','CategoryController',['as'=> 'admin']);
//    Route::resource('itineraries','')
   Route::resource('multimedias','MultimediaController',['as'=> 'admin']);
});

