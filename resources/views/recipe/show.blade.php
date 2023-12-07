@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">
            <h1>{{ $recipe->nameRecipe }}</h1>
            <img src="{{ asset('photos_des_recettes/' . $recipe->photoRecipe) }}" alt="">
            <p>{{ $recipe->contentRecipe }}</p>

    @endsection
