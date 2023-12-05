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

<h3>Ajouter ma recette</h3>

        <div class="row">
            <form class="col-4 mx-auto" action="{{ route('storeRecipe') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="nameRecipe">Titre</label>
                    <input required type="text" class="form-control mb-3" name="nameRecipe" id="nameRecipe">
                </div>
                <div class="input-group">
                    <label class="input-groupe-text" for="photoRecipe"></label>
                    <input required type="file" class="form-control mb-3" name="photoRecipe" id="photoRecipe">
                </div>
                <div class="form-group">
                    <label for="contentRecipe">Etapes de la recette</label>
                    <textarea required type="textarea" class="form-control mb-3" name="contentRecipe" id="contentRecipe" rows="10"></textarea>
                </div>
                <input type="hidden" value="user_id">

                <button type="submit" class="btn btn-primary mb-3">Ajouter</button>
            </form>
            <p>Votre recette devra être validée par l'administrateur avant d'être active dans la liste des recettes !</p>
        </div>

        @endsection
