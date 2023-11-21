@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="pseudoUser"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Pseudo') }}</label>

                                <div class="col-md-6">
                                    <input id="pseudoUser" type="text"
                                        class="form-control @error('pseudoUser') is-invalid @enderror" name="pseudoUser"
                                        value="{{ old('pseudoUser') }}" required autocomplete="pseudoUser" autofocus>

                                    @error('pseudoUser')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="photoUser"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Photo de profil') }}</label>

                                <div class="col-md-6">
                                    <input id="photoUser" type="text"
                                        class="form-control @error('photoUser') is-invalid @enderror" name="photoUser"
                                        value="{{ old('photoUser') }}" required autocomplete="photoUser" autofocus>

                                    @error('photoUser')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="emailUser"
                                    class="col-md-4 col-form-label text-md-end">{{ __('E-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="emailUser" type="email"
                                        class="form-control @error('emailUser') is-invalid @enderror" name="emailUser"
                                        value="{{ old('emailUser') }}" required autocomplete="emailUser">

                                    @error('emailUser')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirmez le mot de passe*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div>
                                <p>* Attention, votre mot de passe doit être composé d'au moins 8 caractères et doit
                                    comprendre au moins une minisucule, une majuscule, un chiffre et un caractère spécial.
                                </p>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Valider') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
