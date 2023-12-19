@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">

        <div class="card">
            <div class="card-header">{{ __('Mes recettes') }}</div>
                <table id="list-recipes" class="ms-3 me-3">
                    <tr>
                        <td></td>
                        <td class="text-center pb-2">Voir la recette</td>
                        <td class="text-center pb-2">Modifier la recette</td>
                    </tr>

                    <tr>
                        @foreach ($recipes as $recipe)
                            <td>
                                <p>{{ $recipe->nameRecipe }}</p>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('showRecipe', $recipe->id) }}"><i class="fa-regular fa-eye"></i></a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('editRecipe', $recipe->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                            </td>
                    </tr>
                    @endforeach
                </table>
            </div>

        <div>
            <div id="linkAddMyRecipe" class="d-flex justify-content-center">
            <a class="text-center" href="{{ route('createRecipe') }}"><i class="fa-solid fa-circle-plus pe-3"></i> Ajouter une nouvelle
                recette</a>
        </div>
    </main>
@endsection
