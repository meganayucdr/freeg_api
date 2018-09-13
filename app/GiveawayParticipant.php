<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiveawayParticipant extends Model
{
    public function giveaway()  {
      return $this->belongsTo('App\Giveaway');
    }
}
