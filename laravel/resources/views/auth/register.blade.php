@extends('layouts.app')

@section('content')
<div class="master">
    <div class="cajaloginresgister">
        <div class="cajaizq"><h1>{{ __('Register') }}</h1> 
        </div>
        <div class="cajader">
            <div class="loginregis">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="camposform">
                        <h2>Registrate</h2>
                    </div>
                    <div class="camposform">
                        <div class="confirmemailpass">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="camposform">
                        <div class="confirmemailpass">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="camposform">
                        <div class="confirmemailpass">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="camposform">
                        <div class="confirmemailpass">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="confirmarform">
                        <div class="enviarform">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
