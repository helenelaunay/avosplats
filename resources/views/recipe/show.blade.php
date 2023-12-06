@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">
        @foreach ($recipes as $recipe)
        <h1>{{ $recipe->nameRecipe }}</h1>
        {{-- <img src="{{ $recipes->photoRecipe }}" alt=""> --}}
        <p>{{ $recipe->contentRecipe }}</p>
        @endforeach

        @endsection