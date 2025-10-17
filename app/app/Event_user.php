<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_user extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }

    public function Event()
    {
        return $this->belongsTo('App\Event', 'event_id', 'id');
    }
}
