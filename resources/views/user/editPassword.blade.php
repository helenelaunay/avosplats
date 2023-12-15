@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">
        <div class="card">
            <div class="card-header">{{ __('Modifier mon mot de passe') }}</div>

                <form id="form" class="col-8 mx-auto" action="{{ route('updatePasswordUser', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mt-2">
                        <label for="password">Mot de passe actuel</label>
                        <input required type="password" class="form-control  @error('password') is-invalid @enderror mb-3"
                            name="password" id="password">
                    </div>
                    <div class="form-group mt-2">
                        <label for="new_password">Nouveau mot de passe *</label>
                        <input required type="password" class="form-control @error('password') is-invalid @enderror mb-3"
                            name="new_password" id="new_password">
                    </div>
                    <div class="form-group mt-2">
                        <label for="confirm_new_password">Confirmez le nouveau mot de passe *</label>
                        <input id="confirm_new_password" type="password"
                            class="form-control @error('password') is-invalid @enderror mb-3" name="confirm_new_password"
                            required autocomplete="new-password">
                    </div>

                    <div>
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
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mb-3">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
