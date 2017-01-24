<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\User;
use App\UserProfile;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('profile.show')->with(compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $userId = Auth::user()->id;
        $profile = UserProfile::updateOrCreate(['user_id' => $userId], $data);
        
        return redirect()->route('profile.show');
    }
}
