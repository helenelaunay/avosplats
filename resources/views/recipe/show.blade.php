@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">
        <div class="d-flex flex-column align-items-center">
            <h2 class="text-center mt-4">{{ $recipe->nameRecipe }}</h2>
            <img src="{{ asset('photos_des_recettes/' . $recipe->photoRecipe) }}" alt="Image de la recette" class="w-75">
            <p>{{ $recipe->contentRecipe }}</p>
        </div>
    @endsection
