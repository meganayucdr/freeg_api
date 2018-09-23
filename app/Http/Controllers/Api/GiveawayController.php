<?php

namespace App\Http\Controllers\Api;

use App\Giveaway;
use App\GiveawayParticipant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\Resource;

class GiveawayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $giveaway = Giveaway::all();
        return Resource::collection($giveaway);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $giveaway = new Giveaway;

        $giveaway->user_id = $request->user_id;
        $giveaway->description = $request->description;
        $giveaway->image = $request->image;
        $giveaway->location = $request->location;
        $giveaway->participants = $request->participants;
        $giveaway->status = $request->status;

        $giveaway->save();
        return (new Resource($giveaway))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Giveaway $giveaway)
    {
        return new Resource($giveaway);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Giveaway $giveaway)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Giveaway $giveaway)
    {
      $giveaway->description = $request->description;
      $giveaway->image = $request->image;
      $giveaway->location = $request->location;
      $giveaway->participants = $request->participants;
      $giveaway->status = $request->status;

      $giveaway->save();
      return (new Resource($giveaway));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giveaway $giveaway)
    {
        $giveaway->delete();

        return (new Resource($giveaway));
    }
    /**
     * Display a listing of the resource by logged in user.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showByUser(Request $request)  {
      $giveaway = Giveaway::where('user_id', $request->user_id)->get();

      return Resource::collection($giveaway);
    }

    public function showJoinedGiveaway(Request $request)  {
      $joinedGiveaway = Giveaway::whereHas('participants', function($participant) use($request) {
        $participant->where('user_id', $request->user_id);
      })->get();

      return Resource::collection($joinedGiveaway);
    }

    public function giveawayWon(Request $request) {
      $won = Giveaway::whereHas('participants', function($participant) use($request) {
        $participant->where('user_id', $request->user_id)
        ->where('status', 'Win');
      })->get();

      return Resource::collection($won);
    }
}
