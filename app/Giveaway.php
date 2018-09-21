<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giveaway extends Model
{
    public function participants()  {
      return $this->hasMany('App\GiveawayParticipant');
    }
}
