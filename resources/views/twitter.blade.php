@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Twitter</div>

                <div class="panel-body">
                   @if($twitterAccount)
                       <ul>
                           <li>user ID: {{$twitterAccount->user_id}}</li>
                           <li>Twitter Screen Name: {{$twitterAccount->twitter_screen_name}}</li>
                           <li>Twitter User ID: {{$twitterAccount->twitter_user_id}}</li>
                           <li>Account Linked Since: {{$twitterAccount->created_at}}</li>
                       </ul>
                   @else
                    <a href="/twitter/login" class="btn btn-primary inverse btn-lg"><i class="fa fa-twitter fa-lg"></i> Link your twitter account</a>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
