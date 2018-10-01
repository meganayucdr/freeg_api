<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Giveaway;
use App\GiveawayParticipant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\Resource;

class GiveawayParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // Participants List
    public function index(Giveaway $giveaway)
    {
      $joinedGiveaway = GiveawayParticipant::where('giveaway_id', $giveaway->id)->get();

      return Resource::collection($joinedGiveaway);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Giveaway $giveaway)
    {
          $joinedGiveaway = new GiveawayParticipant();

          $joinedGiveaway->user_id = $request->user_id;
          $joinedGiveaway->status = 'Joined';
          $joinedGiveaway->giveaway()->associate($giveaway);

          $joinedGiveaway->save();

          return (new Resource($joinedGiveaway))->response()->setStatusCode(201, 'Success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GiveawayParticipant  $giveawayParticipant
     * @return \Illuminate\Http\Response
     */
    public function show(GiveawayParticipant $giveawayParticipant)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GiveawayParticipant  $giveawayParticipant
     * @return \Illuminate\Http\Response
     */
    public function edit(GiveawayParticipant $giveawayParticipant)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GiveawayParticipant  $giveawayParticipant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Giveaway $giveaway, GiveawayParticipant $giveawayParticipant)
    {
      $giveawayParticipant->id = $giveawayParticipant->id;
      $giveawayParticipant->user_id = $request->user_id;
      $giveawayParticipant->status = 'Win';
      $giveaway->status = 'Non Active';
      //$giveaway = Giveaway::where('id', $request->giveaway_id)->get();
      //$giveaway->status = 'Non Active';
      $giveawayParticipant->giveaway()->associate($giveaway);
      $giveawayParticipant->save();
      $giveaway->save();

      return (new Resource($giveawayParticipant));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GiveawayParticipant  $giveawayParticipant
     * @return \Illuminate\Http\Response
     */
    public function destroy($giveaway, $giveawayParticipant)
    {
      $giveaway->participants()->findOrFail($giveawayParticipant)->delete();
      return response()->json(null, 204);
    }

    public function getWinner(Request $request) {
        $winner = GiveawayParticipant::where('giveaway_id', $request->giveaway_id)->where('status', 'Win')->get();

        return (new Resource($winner));
    }

}
