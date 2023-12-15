@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Se connecter') }}</div>

                    <div class="card-body">
                        <form id="form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mt-2">
                                <label for="email" class="col-form-label text-md-end">{{ __('E-mail') }}</label>


                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group mt-2">
                                <label for="password" class="col-form-label text-md-end">{{ __('Mot de passe') }}</label>

                                <div>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Restez connecté(e)') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-2 d-flex justify-content-around flex-column align-items-end">

                                    <div>
                                        <button type="submit" class="btn">
                                            {{ __('Se connecter') }}
                                        </button>
                                    </div>

                                    @if (Route::has('password.request'))
                                        <a class="pt-4" href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oublié ?') }}
                                        </a>
                                    @endif

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
