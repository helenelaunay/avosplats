@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">
        <div class="card">
            <div class="card-header">{{ __('Ajouter ma recette') }}</div>

            <div class="d-flex align-items-center info-div mt-3 ms-3">
                <i class="fa-solid fa-lightbulb"></i>
                <p class="ps-2 mb-0">Pensez à mentionner à combien de personnes correspondent les quantités indiquées. </p>
            </div>

            <form id="form" class="col-8 mx-auto" action="{{ route('storeRecipe') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="form-group mt-5">
                    <label for="nameRecipe">Titre</label>
                    <input required type="text" class="form-control mb-3" name="nameRecipe" id="nameRecipe">
                </div>
                <div id="form-input-image" class="form-group mt-2">
                    <label class="input-groupe-text" for="photoRecipe"></label>
                    <input required type="file" class="form-control mb-3" name="photoRecipe" id="photoRecipe">
                </div>
                <div class="form-group mt-2">
                    <label for="contentRecipe">Etapes de la recette</label>
                    <textarea required type="textarea" class="form-control mb-3" name="contentRecipe" id="contentRecipe" rows="10"></textarea>
                </div>
                <input type="hidden" value="user_id">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mb-3 me-1">Ajouter</button>
                </div>
            </form>
            <div class="d-flex align-items-center justify-content-center info-div ms-2 mb-3">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <p class="ps-2 mb-0">Dans l'attente de sa validation par l'administrateur, votre recette ne sera pas visible
                    dans la liste des recettes !</p>
            </div>
            <div class="d-flex align-items-center justify-content-center info-div ms-2 mb-3">
                <i class="fa-solid fa-flag"></i>
                <p class="ps-2 mb-0">Vous ne pouvez pas supprimer votre recette après édition/modification. Seul un
                    administrateur peut réaliser cette action.</p>
            </div>

        </div>
    </main>
@endsection
