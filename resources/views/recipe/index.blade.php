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
            <form action="{{ route('addRecipeMeal') }}" method="POST">
                @csrf
                @method('POST')
                @foreach ($recipes as $recipe)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="recipe_id" value="{{ $recipe->id }}" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            {{ $recipe->nameRecipe }}
                        </label>
                        <p><a href="">Voir la recette</a></p>

                    </div>
                @endforeach
                <input type="hidden" value="{{ $meal_id }}" name="meal_id">
                <div>
                    <button type="submit">Ajouter à mon menu</button>
                </div>
            </form>



        </div>

        <div>
            <a href=" {{ route('createRecipe') }}">Ajouter ma recette</a>
        </div>

    @endsection
