@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">
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
                        <a href="{{ route('showRecipe', $recipe->id) }}"><i class="fa-regular fa-eye"></i></a>
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
