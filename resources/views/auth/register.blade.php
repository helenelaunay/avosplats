@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Créer un compte') }}</div>

                    <div class="card-body">
                        <form id="form"  method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mt-2">
                                <label for="pseudo"
                                    class="col-form-label text-md-end">{{ __('Pseudo') }}</label>

                                <div>
                                    <input id="pseudo" type="text"
                                        class="form-control @error('pseudo') is-invalid @enderror" name="pseudo"
                                        value="{{ old('pseudo') }}" required autocomplete="pseudo" autofocus>

                                    @error('pseudo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="form-input-image" class="form-group mt-2">
                                <label for="photo"
                                    class="col-form-label text-md-end">{{ __('Photo de profil') }}</label>

                                <div>
                                    <input id="photo" type="file"
                                        class="form-control @error('photo') is-invalid @enderror" name="photo"
                                        value="{{ old('photo') }}" required autocomplete="photo" autofocus>

                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="email"
                                    class="col-form-label text-md-end">{{ __('E-mail') }}</label>

                                <div>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="password"
                                    class="col-form-label text-md-end">{{ __('Mot de passe *') }}</label>

                                <div>
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

                            <div class="form-group mt-2">
                                <label for="password-confirm"
                                    class="col-form-label text-md-end">{{ __('Confirmez le mot de passe *') }}</label>

                                <div>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div>
                                <p>* Attention, votre mot de passe doit être composé d'au moins 8 caractères et doit
                                    comprendre au moins :</p>
                                <ul>
                                    <li>une minisucule,</li>
                                    <li>une majuscule,</li>
                                    <li>un chiffre,</li>
                                    <li>un caractère spécial.</li>
                                </ul>
                            </div>
                            <div>
                                <div class="d-flex justify-content-end">
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
