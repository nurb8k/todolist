@extends('layouts.master')

@section('content')
    <div class="container col-4 bg-grey mt-5 p-4 border">
    <form method="post" action="{{ route('register.post') }}">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <h1 class="h3 mb-3 fw-normal">Register</h1>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name " required="required" autofocus>
            <label for="floatingName">Name</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('nickname')}}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="surname" value="{{ old('surname') }}" placeholder="surname" required="required" autofocus>
            <label for="floatingName">Surname</label>
            @if ($errors->has('surname'))
                <span class="text-danger text-left">{{ $errors->first('nickname')}}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="nickname" value="{{ old('nickname') }}" placeholder="Nickname" required="required" autofocus>
            <label for="floatingName">Nickname</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('nickname')}}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Confirm Password</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary btn-sm" type="submit">Register</button>

    </form>
    </div>
@endsection