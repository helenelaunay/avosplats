@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">


        <table id="list-recipes">
<tr>
    <td>Nom de la recette</td>
    <td>Voir la recette</td>
    <td>Modifier la recette</td>
</tr>

            <tr>
                @foreach ($recipes as $recipe)
                    <td>
                        <p>{{ $recipe->nameRecipe }}</p>
                    </td>
                    <td>
                        <a href="{{ route('showRecipe', $recipe->id) }}"><i class="fa-regular fa-eye"></i></a>
                    </td>
                    <td>
                        <a href="{{ route('editRecipe', $recipe->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                    </td>
            </tr>
            @endforeach
        </table>





        <div>
            <a href=" {{ route('createRecipe') }}"><i class="fa-solid fa-circle-plus"></i> Ajouter une nouvelle recette</a>
        </div>
    </main>
@endsection
