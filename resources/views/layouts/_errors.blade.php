@if ($errors->any())
<br>
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
<br>
@endif
