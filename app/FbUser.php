<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FbUser extends Model
{
    protected $fillable = ['id', 'user_id' ,'name', 'email', 'fb_id', 'user_friends', 'user_likes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
