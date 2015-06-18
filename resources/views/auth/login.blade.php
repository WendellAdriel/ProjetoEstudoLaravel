@extends('app')

@section('content')
    <form class="form-horizontal" method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div class="form-group">
        <label>Email</label>
        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password" id="password">
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="remember"> Remember me
        </label>
    </div>

    <br/><br/>

    <div class="form-group">
        <button class="btn btn-success" type="submit">
            Login <i class="glyphicon glyphicon-log-in"></i>
        </button>
    </div>
</form>
@stop
