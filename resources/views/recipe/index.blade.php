@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">
        <div class="card">
            <div class="card-header">{{ __('Choisir une recette') }}</div>
            <table id="tableRecipe" class="ms-3 me-3">
                <tr>
                    <td></td>
                    <td class="text-left fw-bold pt-3 pb-3">Sélectionner la recette</td>
                    <td class="text-center fw-bold pt-3 pb-3">Voir la recette</td>
                    <td></td>
                </tr>
                <form class="col-10 mx-auto" action="{{ route('addRecipeMeal') }}" method="POST">
                    @csrf
                    @method('POST')
                    @foreach ($recipes as $recipe)
                        <tr>
                            <td>
                                <input class="form-check-input mb-4" type="radio" name="recipe_id" value="{{ $recipe->id }}"
                                    id="flexRadioDefault1">
                            </td>
                            <td>
                                <label class="form-check-label mb-4" for="flexRadioDefault1">
                                    {{ $recipe->nameRecipe }} </label>
                                <input type="hidden" value="{{ $meal_id }}" name="meal_id">
                                <input type="hidden" value="{{ $menu_id }}" name="menu_id">

                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('showRecipe', $recipe->id) }}"><i class="fa-regular fa-eye mb-4"></i></a>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <button class="mb-4" type="submit">Ajouter à mon menu</button>
                                </div>

                            </td>


                        </tr>
                    @endforeach
                </form>
            </table>


        </div>
        </div>

        <div id="linkAddMyRecipe" class="d-flex justify-content-center">
            <a class="text-center" href="{{ route('createRecipe') }}"><i class="fa-solid fa-circle-plus pe-3"></i>Ajouter ma recette</a>
        </div>
    @endsection
