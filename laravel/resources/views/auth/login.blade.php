@extends('layouts.app')

@section('content')
<div class="prueba">
    <div class="prueba2">
        <div class="prueba3"><h1>{{ __('Login') }}</h1>   
        </div>
        <div class="prueba4">
            <div class="prueba8">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="prueba6">
                        <h2>Ingresar a tu cuenta</h2>
                    </div>
                    <div class="prueba6">
                        <div class="confirmemailpass">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                        </div>
                    </div>

                    <div class="prueba6">
                        <div class="confirmemailpass">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="prueba7">
                        <div class="prueba9">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="prueba10">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
