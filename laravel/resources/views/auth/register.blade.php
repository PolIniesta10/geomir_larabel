@extends('layouts.app')

@section('content')
<div class="master">
    <div class="cajaloginregister">
        <div class="cajaizq">
        </div>
        <div class="cajader">
            <div class="loginregis">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="camposform">
                        <div class="confirmemailpass">
                            <h2>Registrate</h2>
                        </div>
                    </div>
                    <div class="camposform">
                        <div class="confirmemailpass">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre" required autocomplete="name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="camposform">
                        <div class="confirmemailpass">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="camposform">
                        <div class="confirmemailpass">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="camposform">
                        <div class="confirmemailpass">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repetir contraseña" required autocomplete="new-password">
                            <span></span>                        
                        </div>
                    </div>
                    <div class="confirmarform">
                        <div class="enviarformreg">
                            <button type="submit" class="btn btn-dark">
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
