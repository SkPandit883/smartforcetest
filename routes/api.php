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


Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/PlayList','MediaController@createPlayList')->name('PlayList.create');
    Route::get('/PlayList','MediaController@getPlayLists')->name('PlayList.get');
    Route::post('/Songs','MediaController@createSong')->name('Songs.create');
    Route::get('/Songs/{play_list_id}','MediaController@getSongs')->name('Songs.get');
});

Route::post('/login','ApiLoginController@Login')->name('login');
Route::post('/logout','ApiLoginController@Logout')->name('logout');
