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

        <h1>Modifier mon menu</h1>

        <h3 class="pb-3"></h3>
        <div class="">
            <div class="row">

                <form class="col-4 mx-auto" action="{{ route ('updateMenu', $menu->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nameMenu">Nouveau nom de votre menu</label>
                        <input required type="text" class="form-control mb-3" placeholder="modifier" value="{{ $menu->nameMenu }}" name="nameMenu"
                            id="nameMenu">
                    </div>

                    <button type="submit" class="btn btn-primary mb-3">Valider</button>
                </form>

    </main>
@endsection