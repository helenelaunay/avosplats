@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">

        <div class="container-fluid text-center">
            @if (session()->has('message'))
                <p class="alert alert-success"> {{ session()->get('message') }}</p>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div> 

        <h1>Mon compte</h1>

        <h3 class="pb-3">Modifier mon mot de passe</h3>
        <div class="">
            <div class="row">

                <form class="col-4 mx-auto" action="{{ route('updatePasswordUser', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="password">Mot de passe actuel</label>
                        <input required type="password" class="form-control  @error('password') is-invalid @enderror mb-3" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="new_password">Nouveau mot de passe</label>
                        <input required type="password" class="form-control @error('password') is-invalid @enderror mb-3" name="new_password" id="new_password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_new_password">Confirmez le nouveau mot de passe</label>
                        <input id="confirm_new_password" type="password" class="form-control @error('password') is-invalid @enderror mb-3" name="confirm_new_password" required autocomplete="new-password">
                        </div>
                    
                    <div>
                        <p>* Attention, votre mot de passe doit être composé d'au moins 8 caractères et doit
                            comprendre au moins<br> une minisucule,<br> une majuscule,<br> un chiffre,<br> un caractère spécial.
                        </p>
                    </div>

                    <button type="submit" class="btn btn-primary mb-3">Valider</button>
                </form>
            </div>
        </div>
    </main>
@endsection
