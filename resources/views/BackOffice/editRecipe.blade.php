@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">


<h3>Modifier la recette</h3>
        <div class="row">
            <form class="col-4 mx-auto" action="{{ route('updateRecipeBackOffice', $recipe->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nameRecipe">Titre</label>
                    <input required type="text" class="form-control mb-3" name="nameRecipe" id="nameRecipe" value="{{ $recipe->nameRecipe }}">
                </div>
                <div class="input-group">
                    <label class="input-groupe-text" for="photoRecipe"></label>
                    <input type="file" class="form-control mb-3" name="photoRecipe" id="photoRecipe">
                </div>
                <div class="form-group">
                    <label for="contentRecipe">Etapes de la recette</label>
                    <textarea required type="textarea" class="form-control mb-3" name="contentRecipe" id="contentRecipe" rows="10">{{ $recipe->contentRecipe }}</textarea>
                </div>
                <input type="hidden" value="user_id">

                <button type="submit" class="btn btn-primary mb-3">Modifier</button>
            </form>

        </div>

        @endsection