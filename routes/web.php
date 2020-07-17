<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'guestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/addAnonce', 'HomeController@annonceStore')->name('annonceStore');
Route::get('/delAnnonce/{id}', 'HomeController@annonceDestroy')->name('delAnnonce');
Route::get('/showAnnonce/{id}', 'guestController@annonceShow')->name('showAnnonce');


Route::post('/addDemande', 'HomeController@demmandeStore')->name('demmandeStore');
Route::get('/delDemande/{id}', 'HomeController@demmandeDestroy')->name('deldemmande');
Route::get('/showDemande/{id}', 'guestController@demmandeShow')->name('showDemmande');

Route::get('/profil', 'HomeController@profilShow')->name('profile');
Route::post('/profil', 'HomeController@profilSave')->name('saveprofile');
