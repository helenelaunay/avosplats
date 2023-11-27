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

        <h1>Créer mon menu</h1>

        <h3 class="pb-3"></h3>
        <div class="">
            <div class="row">
                <form class="col-4 mx-auto" action="{{ route ('storeMenu', $user->id) }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="nameMenu">Nom de votre menu</label>
                        <input required type="text" class="form-control mb-3" name="nameMenu"
                            id="nameMenu">
                            
                    </div>

                    <button type="submit" class="btn btn-primary mb-3">Valider</button>
                </form>
<table>
    @foreach ($meals as $meal)
    <tr>{{ $meal->nameMeal }}</tr>
    @endforeach
</table>

            </div>
            <ul>
                @foreach ($recipes as $recipe)
                    <li>{{ $recipe->nameRecipe }} </li>
                @endforeach
            </ul>
        </div>
    </main>
@endsection
