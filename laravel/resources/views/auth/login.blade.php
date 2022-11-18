@extends('layouts.app')

@section('content')
<div class="master">
    <div class="cajaloginregister">
        <div class="cajaizq"><img class="img-fluid" src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_960_720.jpg" title="Logo"/>   
        </div>
        <div class="cajader">
            <div class="loginregis">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="camposform">
                        <h2>Ingresar a tu cuenta</h2>
                    </div>
                    <div class="camposform">
                        <div class="confirmemailpass">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                        </div>
                    </div>

                    <div class="camposform">
                        <div class="confirmemailpass">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="confirmarform">
                        <div class="remember">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="enviarform">
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
