<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }

    public function Event_user()
    {
        return $this->hasMany('App\Event_user', 'id', 'event_id');
    }
}
