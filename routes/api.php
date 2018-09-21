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
Route::apiResource('giveaways', 'Api\GiveawayController', [ 'as' => 'api' ]);
Route::apiResource('giveaways.participants', 'Api\GiveawayParticipantController', [ 'as' => 'api' ]);
Route::get('giveaways/show/{user_id}', 'Api\GiveawayController@showByUser')->name('api.giveaways.showbyuser');
Route::get('giveaways/{user_id}/joined', 'Api\GiveawayController@showJoinedGiveaway')->name('api.giveaways.joined');
