@extends('layouts.app')

@section('content')
<div class="master">
    <div class="cajaloginregister">
        <div class="cajaizq">
        </div>
        <div class="cajader">
            <div class="loginregis">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="camposform">
                        <h2>Login</h2>
                    </div>
                    <div class="camposform">
                        <div class="confirmemailpass">
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                        </div>
                    </div>

                    <div class="camposform">
                        <div class="confirmemailpass">
                            <input id="email" type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="confirmarform">
                        <div class="enviarform">
                            <div>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="forgotpass">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
