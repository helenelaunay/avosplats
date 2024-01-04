@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">
        <div class="card">
            <div class="card-header">{{ __('Créer mon menu') }}</div>


            <form id="form" class="col-8 mx-auto" action="{{ route('storeMenu', $user->id) }}" method="POST">
                @csrf
                @method('POST')

                <div class="form-group mt-5">
                    <label for="nameMenu">Nom de votre menu</label>
                    <input required type="text" class="form-control mb-3" name="nameMenu" id="nameMenu">

                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mb-5">Valider</button>
                </div>
            </form>

            <div>
                <p class="text-center mb-5">Attention : Vous ne pouvez afficher que 2 menus. Si deux menus sont déjà créés
                    sur
                    votre profil, le plus ancien disparaitra à la création d'un nouveau.</p>
            </div>

        </div>
    </main>
@endsection
