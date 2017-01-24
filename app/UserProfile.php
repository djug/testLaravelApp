<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserProfile extends Model
{
    protected $fillable = ['name', 'country', 'address'];

    public function user()
    {
        return $this->belongTo(User::class);
    }
}
