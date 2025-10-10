<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userDate extends Model
{

    protected $fillable = ['user_id', 'comment', 'image'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
}
