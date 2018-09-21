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
    public function index()
    {

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
    public function store(Request $request)
    {
        $joinedGiveaway = new GiveawayParticipant();

        $joinedGiveaway->user_id = $request->user_id;
        $joinedGiveaway->giveaway_id = $request->giveaway_id;
        $joinedGiveaway->status = 'Joined';

        $joinedGiveaway->save();

        return (new Resource($joinedGiveaway))->response()->setStatusCode(201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GiveawayParticipant  $giveawayParticipant
     * @return \Illuminate\Http\Response
     */
    public function show(GiveawayParticipant $giveawayParticipant)
    {
        //
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
        //
    }

    public function joinedGiveaway(Request $request)    {
        $joinedGiveaway = Giveaway::where('id', $request->giveaway_id)
                            ->where('status', 'joined');

        return Resource::collection($joinedGiveaway);
    }
}
