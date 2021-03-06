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
//Route::get('giveaways/{giveaway_id}/participants', 'Api\GiveawayController@index')->name('api.giveaways.index');
//Route::post('giveaways/{giveaway_id}/participants', 'Api\GiveawayController@store')->name('api.giveaways.store');
//Route::delete('giveaways/{giveaway_id}/participants/{participant}', 'Api\GiveawayController@delete')->name('api.giveaways.destroy');
//Route::put('giveaways/{giveaway_id}/participants/{participant}', 'Api\GiveawayController@update')->name('api.giveaways.update');
Route::get('giveaways/show/{user_id}', 'Api\GiveawayController@showByUser')->name('api.giveaways.showbyuser');
Route::get('giveaways/{user_id}/joined', 'Api\GiveawayController@showJoinedGiveaway')->name('api.giveaways.joined');
Route::get('giveaways/{user_id}/won', 'Api\GiveawayController@giveawayWon')->name('api.giveaways.won');
Route::get('giveaways/{giveaway_id}/participants/winner/list', 'Api\GiveawayParticipantController@getWinner')->name('api.giveaways.participants.winner');
//Route::put('giveaways/{giveaway_id}/participants/{user_id}', 'Api\GiveawayParticipantController@setWinner')->name('api.giveaways.participants.winner');
