<?php

namespace App\Http\Controllers\Api;

use App\GiveawayParticipant;
use App\Giveaway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GiveawayParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Giveaway  $giveaway
     * @return \Illuminate\Http\Response
     */
    public function index(Giveaway $giveaway)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Giveaway  $giveaway
     * @return \Illuminate\Http\Response
     */
    public function create(Giveaway $giveaway)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Giveaway  $giveaway
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Giveaway $giveaway)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Giveaway  $giveaway
     * @param  \App\GiveawayParticipant  $giveawayParticipant
     * @return \Illuminate\Http\Response
     */
    public function show(Giveaway $giveaway, GiveawayParticipant $giveawayParticipant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Giveaway  $giveaway
     * @param  \App\GiveawayParticipant  $giveawayParticipant
     * @return \Illuminate\Http\Response
     */
    public function edit(Giveaway $giveaway, GiveawayParticipant $giveawayParticipant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Giveaway  $giveaway
     * @param  \App\GiveawayParticipant  $giveawayParticipant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Giveaway $giveaway, GiveawayParticipant $giveawayParticipant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Giveaway  $giveaway
     * @param  \App\GiveawayParticipant  $giveawayParticipant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giveaway $giveaway, GiveawayParticipant $giveawayParticipant)
    {
        //
    }
}
