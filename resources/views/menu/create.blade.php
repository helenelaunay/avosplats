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

        <h1>Créer mon menu</h1>

        <h3 class="pb-3"></h3>
        <div class="">
            <div class="row">
                <form class="col-4 mx-auto" action="{{ route ('storeMenu', $user->id) }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="nameMenu">Nom de votre menu</label>
                        <input required type="text" class="form-control mb-3" name="nameMenu"
                            id="nameMenu">
                            
                    </div>

                    <button type="submit" class="btn btn-primary mb-3">Valider</button>
                </form>
<div>
    <p>Attention : Vous ne pouvez afficher que 2 menus. Si deux menus sont déjà créés sur votre profil, le plus ancien disparaitra à la création d'un nouveau.</p>
</div>
    </main>
@endsection
