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

        <div>

            @foreach ($recipes as $recipe)
                <p>{{ $recipe->nameRecipe }}</p>
                <a href="{{ route('showRecipe', $recipe->id) }}">Voir</a>
                <a href="{{ route('editRecipe', $recipe->id) }}">Modifier</a>
                <form id="deleteUserForm" action="{{ route('destroyRecipe', $recipe->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Supprimer</button>
                </form>
        </div>
        @endforeach



        <div>
            <a href=" {{ route('createRecipe') }}">Ajouter une nouvelle recette</a>
        </div>

    @endsection
