<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class TwitterAccount extends Model
{
    protected $fillable = ['twitter_screen_name', 'twitter_user_id', 'oauth_token', 'oauth_token_secret', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
