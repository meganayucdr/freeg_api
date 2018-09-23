<?php

namespace App\Http\Controllers\Api;

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
        $particpantsTotal = GiveawayParticipant::where('giveaway_id', $giveaway->id)->count();

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GiveawayParticipant  $giveawayParticipant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GiveawayParticipant $giveawayParticipant)
    {
        $giveawayParticipant->status = 'Cancel';

        $giveawayParticipant->save();

        return (new Resource($giveawayParticipant));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GiveawayParticipant  $giveawayParticipant
     * @return \Illuminate\Http\Response
     */
    public function destroy(GiveawayParticipant $giveawayParticipant)
    {
        $giveawayParticipant->delete();

        return (new Resource($giveawayParticipant));
    }

    public function getWinner(Request $request) {
        $winner = GiveawayParticipant::where('giveaway_id', $request->giveaway_id)
            ->where('status', 'Win');

        return (new Resource($winner));
    }
}
