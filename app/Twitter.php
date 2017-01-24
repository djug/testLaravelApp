<?php
namespace App;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\User;

class Twitter
{
    private $twitter;

    public function __construct($userId)
    {
        $user = User::find($userId);
        $oauthToken = $user->twitterAccount->oauth_token;
        $oauthTokenSecret = $user->twitterAccount->oauth_token_secret;

        $this->twitter = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), $oauthToken, $oauthTokenSecret);
    }



    public function getUserProfile()
    {
        //GET account/verify_credentials
        $user = $this->twitter->get('account/verify_credentials');
        return $user;
    }

    public function getUserProfilePicture($userTwitterId)
    {
        //GET https://api.twitter.com/1.1/users/show.json?screen_name=twitterdev
        $user = $this->twitter->get('users/show', ['user_id' => $userTwitterId]);
        return $user->profile_image_url_https;
    }
}