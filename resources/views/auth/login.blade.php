@extends('layouts.master')

@section('content')
    <div class="container col-4 bg-grey mt-5 p-4 border">
    <form method="post" action="{{ route('login.post') }}">
        @csrf

        <h1 class="h3 mb-3 fw-normal">Login</h1>
        @if ($errors->has('error'))
            <span class="text-danger text-left p-2">{{ $errors->first('error') }}</span>
        @endif
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="nickname" value="{{ old('nickname') }}" placeholder="Nickname" required="required" autofocus>
            <label for="floatingName">Nickname</label>
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

    </form>
    </div>
@endsection