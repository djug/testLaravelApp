@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                   <form action="{{route('profile.store')}}" method="POST" role="form">
                       <legend>Profile</legend>
                        {{ csrf_field() }}
                       <div class="form-group">
                           <label for="">Your name:</label>
                           <input type="text" class="form-control" id="name" name="name" placeholder="your full name" required>
                       </div>

                       <div class="form-group">
                           <label for="">Your Country:</label>
                           <input type="text" class="form-control" id="country" name="country" placeholder="Where do you live" required>
                       </div>

                       <div class="form-group">
                           <label for="">Your address:</label>
                           <input type="text" class="form-control" id="address" name="address" placeholder="your postal address" required>
                       </div>
                   
                       
                   
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
