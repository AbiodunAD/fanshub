@extends('layouts.app')

@section('title')
 Login - afribeats®
@endsection

@section('content')
    <h3>Have an account? Login</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <input id="email" type="email" placeholder="Email Address:" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <input id="password" placeholder="Password:" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
                <div class="form-check remb">
                    <input class="form-check-input chek" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label rem" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a class="btn btn-link fgt" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                
            </div>
        </div>
    </form>
    <p>Don’t have an account? <a href="{{ route('register') }}">Register here</a></p>
@endsection
