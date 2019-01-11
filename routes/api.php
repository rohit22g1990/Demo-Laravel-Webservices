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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'],function () {
    Route::post('create-individual', 'IndividualController@create');

    Route::get('contact-types', 'ContactTypeController@index');
    Route::post('contact-types', 'ContactTypeController@create');

    Route::get('relation-types', 'RelationTypeController@index');
    Route::post('relation-types', 'RelationTypeController@create');

    Route::get('function-types', 'FunctionTypeController@index');
    Route::post('function-types', 'FunctionTypeController@create');

    Route::get('address-types', 'AddressTypeController@index');
    Route::post('address-types', 'AddressTypeController@create');

    Route::get('salutations', 'SalutationController@index');
    Route::post('salutations', 'SalutationController@create');

    Route::get('nationalities', 'NationalityController@index');
    Route::post('nationalities', 'NationalityController@create');

    Route::get('countries', 'CountryController@index')->middleware('auth:api');
    Route::post('countries', 'CountryController@create');

    Route::get('cities', 'CityController@index')->middleware('auth:api');
    Route::post('cities', 'CityController@create');
    Route::get('cities/{countryId}', 'CityController@getCitiesByCountryId');

    Route::put('update-profile-pic/{individual_id}', 'IndividualController@updateProfilePic');
});