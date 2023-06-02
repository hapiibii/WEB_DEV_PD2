@extends('layout')

@section('content')

    <h1>{{$title}}</h1>
    <hr>

    @if($errors->any())
        <div class="alert alert-danger">
            Could not connect. Please, try again!
        </div>
    @endif
    
    <form method="post" action="/auth">
        @csrf 

        <div class="mb-3">
            <label for="login-name" class="form-label">Username</label>
            <input type="text" id="login-name" name="name" class="form-control" autocomplete="off" autofocus>
        </div>

        <div calss="mb-3">
            <label for="login-password" class="form-label">Password</label>
            <input type="password" id="login-password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>

    </form>

@endsection