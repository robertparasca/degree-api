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

Route::middleware(['auth:api'])->group(function () {
    Route::get('/me', 'Api\UserController@me');
    Route::get('/users', 'Api\UserController@index');
    Route::get('/users/{id}', 'Api\UserController@show');
    Route::post('/users/{id}/edit-permissions', 'Api\UserController@updatePermissions');

    Route::get('/tickets', 'Api\TicketController@index');
    Route::post('/tickets', 'Api\TicketController@store');

    Route::get('/permissions', 'Api\PermissionController@index');
});

Route::get('/students/import', 'Api\StudentController@import');

Route::post('/register', 'Api\AuthController@register');
Route::post('/login-password', 'Api\AuthController@login');

Route::post('/callback', 'Api\AuthController@handleProviderCallback');

