<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\User;
use App\UserProfile;
use App\Http\Requests\StoreProfile;

class UserProfileController extends Controller
{
    /**
     * show users locale profile (information persisted in the DB)
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        $profile = $user->profile;

        if (! $profile) {
            return redirect()->route('profile.create');
        }

        return view('profile.show')->with(compact('profile'));
    }

    /**
     * create the user profile
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $profile = $user->profile;
        if ($profile) {
            return redirect()->route('profile.show');
        }
        return view('profile.create');
    }

   /**
    * store the user profile
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StoreProfile $request)
    {
        $data = $request->all();
        $userId = Auth::user()->id;
        $profile = UserProfile::updateOrCreate(['user_id' => $userId], $data);
        
        return redirect()->route('profile.show');
    }
}
