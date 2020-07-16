<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

// List demandes
Route::get('demandes', 'DemandeController@index');

// List single demande
Route::get('demande/{id}', 'DemandeController@show');

// Create new demande
Route::post('demande', 'DemandeController@store');

// Update demande
Route::put('demande', 'DemandeController@store');

// Delete demande
Route::delete('demande/{id}', 'DemandeController@destroy');



// List annonces
Route::get('annonces', 'AnnonceController@index');

// List single annonce
Route::get('annonce/{id}', 'AnnonceController@show');

// Create new annonce
Route::post('annonce', 'AnnonceController@store');

// Update annonce
Route::put('annonce', 'AnnonceController@store');

// Delete annonce
Route::delete('annonce/{id}', 'AnnonceController@destroy');


Route::post('auth/register', 'Auth\RegisterController@apiCreate');
Route::post('auth/update', 'Auth\LoginController@apiUpdate');
Route::post('auth/login', 'Auth\LoginController@apiLogin');

