<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\TwitterAccount;
use App\Twitter;

class TwitterController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $twitterAccount = $user->TwitterAccount;

        $twitter = new Twitter($user->id);
        $twitterProfile = $twitter->getUserProfile();

        return view('twitter')->with(compact('twitterAccount', 'twitterProfile'));
    }

    public function getLogin()
    {
        $connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'));
        $requestToken = $connection->oauth('oauth/request_token', array('oauth_callback' => env('TWITTER_OAUTH_CALLBACK')));
        $url = $connection->url('oauth/authenticate', array('oauth_token' => $requestToken['oauth_token']));
        return redirect($url);
    }

    public function getCallback(Request $request)
    {
        $inputs = $request->all();
       
        $oauthToken = $inputs['oauth_token'];
        $oauthVerifier = $inputs['oauth_verifier'];

        $connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), $oauthToken, $oauthVerifier);

        $accessToken = $connection->oauth("oauth/access_token", ["oauth_verifier" => $oauthVerifier]);
        
        //We suppose that each user can link her account to a single twitter account, so we user `updateOrCreate` instead of `create` in order to update the record instead of creating a new one in the case of the user logs in with a different account
        $twitterAccount = TwitterAccount::updateOrCreate(['user_id' => Auth::user()->id], [
                                    'twitter_user_id' => $accessToken['user_id'],
                                    'oauth_token' => $accessToken['oauth_token'],
                                    'oauth_token_secret' => $accessToken['oauth_token_secret'],
                                    'twitter_screen_name' => $accessToken['screen_name'],
                                ]);
        
        return redirect()->route('twitter');
    }
}
