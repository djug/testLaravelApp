<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserProfile extends Model
{
    protected $fillable = ['name', 'country', 'address', 'user_id'];

    public function user()
    {
        return $this->belongTo(User::class);
    }
}
