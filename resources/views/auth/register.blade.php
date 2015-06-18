@extends('app')

@section('content')
    <form class="form-horizontal" method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <div class="form-group">
        <label>Name</label>
        <input class="form-control" type="text" name="name" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input class="form-control" type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password">
    </div>

    <div class="form-group">
        <label>Confirm Password</label>
        <input class="form-control" type="password" name="password_confirmation">
    </div>

    <div class="form-group">
        <button class="btn btn-success" type="submit">
            Register <i class="glyphicon glyphicon-plus"></i>
        </button>
    </div>
</form>
@stop
