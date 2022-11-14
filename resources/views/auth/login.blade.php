@extends('layouts.app')

@section('content')
<div class="container card-login">
    <div class="row justify-content-center">
        <div class="col-md-6 p-4">

            <div class="card shadow p-3 mb-5 bg-white rounded">
                {{-- <div class="card-header">{{ __('Inicio de sesion') }}</div> --}}

                <div class="card-header" style="text-align: center">

                    <img src="/cosechasoft/images/logo_footer.png" alt=""  width="220">

                </div>

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-row mb-2">
                            {{-- <label for="email" class="col-form-label text-md-end">{{ __('Correo electronico') }}</label> --}}

                            <div class="form-group">
                                <input id="email" type="email" placeholder="{{__("Correo electronico")}}" class="form-control login-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            {{-- <label for="password" class="col-form-label text-md-end">{{ __('Contraseña') }}</label> --}}

                            <div class="form-group">
                                <input id="password" type="password" placeholder="{{__("Contraseña")}}" class="form-control login-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                {{-- <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuerdame') }}
                                    </label>
                                </div> --}}
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary btn-cosecha">
                                    {{ __('Iniciar Sesion') }}
                                </button>
                            </div>
                            {{-- <div class="col-md-8">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvido su clave?') }}
                                    </a>
                                @endif
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
