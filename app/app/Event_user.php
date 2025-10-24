<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_user extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function Event()
    {
        return $this->belongsTo('App\Event', 'event_id', 'id');
    }
}
