<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
 */
Route::get('/', 'RecipeFinderController@index');
Route::get('index', array('as' => 'index', 'uses' => 'RecipeFinderController@index'));
Route::post('recipes/find', 'RecipeFinderController@find');
