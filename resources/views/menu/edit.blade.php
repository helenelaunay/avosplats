@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">
        <div class="card">
            <div class="card-header">{{ __('Modifier mon menu') }}</div>



            <form id="form" class="col-8 mx-auto m-5" action="{{ route('updateMenu', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mt-2">
                    <label for="nameMenu">Nouveau nom de votre menu</label>
                    <input required type="text" class="form-control mt-2" placeholder="modifier"
                        value="{{ $menu->nameMenu }}" name="nameMenu" id="nameMenu">
                </div>
                <div class="form-group mt-2 mb-5 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mt-3">Valider</button>
                </div>
            </form>

        </div>
    </main>
@endsection
