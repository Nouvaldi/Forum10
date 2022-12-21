@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="form-login card w-100 m-auto shadow-sm">
                <div class="card-header"><i class="bi bi-box-arrow-in-right"></i> {{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-floating">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="name@example.com" required autocomplete="email" autofocus>
                            <label for="email">{{ __('Email Address') }}</label>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                            <label for="password">{{ __('Password') }}</label>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3 ms-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="row my-0 ms-auto me-auto">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                        </div>

                        <div class="d-block text-center my-2">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link py-0" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                        </div>

                        <div class="d-flex justify-content-between align-items-center my-3">
                            <div class="leftStripe"></div>
                            <small>or</small>
                            <div class="rightStripe"></div>
                        </div>

                        <div class="card shadow-sm">
                            <a class="btn btn-link-dark" href="{{ route('auth-google') }}">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-google mx-2 fs-4"></i>
                                    <p class="my-0">Login with Google</p>
                                </div>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
