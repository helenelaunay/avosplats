@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">
        <div class="card">
            <div class="card-header">{{ __('Modifier la recette') }}</div>


            <form id="form" class="col-8 mx-auto" action="{{ route('updateRecipeBackOffice', $recipe->id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mt-2">
                    <label for="nameRecipe">Titre</label>
                    <input required type="text" class="form-control mb-3" name="nameRecipe" id="nameRecipe"
                        value="{{ $recipe->nameRecipe }}">
                </div>
                <div class="form-group mt-2">
                    <img class="mb-2" src="{{ asset('photos_des_recettes/' . $recipe->photoRecipe) }}"
                        alt="Photo de la recette">
                    <label class="input-groupe-text" for="photoRecipe"></label>
                    <input type="file" class="form-control mb-3" name="photoRecipe" id="photoRecipe">
                </div>
                <div class="form-group mt-2">
                    <label for="contentRecipe">Etapes de la recette</label>
                    <textarea required type="textarea" class="form-control mb-3" name="contentRecipe" id="contentRecipe" rows="10">{{ $recipe->contentRecipe }}</textarea>
                </div>
                <input type="hidden" value="user_id">

                <div class="d-flex justify-content-end">
                    <button type="submit" class="mb-5">Valider</button>
                </div>
            </form>

        </div>
    </main>
@endsection
