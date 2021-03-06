<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'api',

], function ($router) {

    Route::post('auth/login', 'AuthController@login');
    Route::post('auth/register', 'AuthController@register');
    Route::post('auth/logout', 'AuthController@logout');
    Route::post('auth/refresh', 'AuthController@refresh');
    Route::get('auth/user', 'AuthController@user');

    Route::post('/add_post', 'PostController@addPost');
    Route::get('/post/{user}', 'PostController@getUserPost');
    Route::get('/post', 'PostController@getAllPost');

    Route::post('/addpet', 'PetController@addpet');
    Route::get('/pet/{pet}', 'PetController@getPet');
    Route::get('/user/{user}/pet_list', 'PetController@getUserPet');
    Route::get('/user/{user}/pet_count', 'PetController@getUserPetCount');

    Route::get('/traits', 'TraitController@getTraits');
});
