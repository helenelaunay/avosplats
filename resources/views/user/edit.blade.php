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

        <h1>Mon compte</h1>

        <h3 class="pb-3">Modifier mes informations</h3>
        <div class="">
            <div class="row">

                <form class="col-4 mx-auto" action="{{ route('updateUser', $user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="photo">Nouveau pseudo</label>
                        <input required type="text" class="form-control mb-3" placeholder="modifier" name="pseudo"
                            value="{{ $user->pseudo }}" id="pseudo">
                    </div>
                    <div class="form-group">
                        <label for="image">Nouvelle photo de profil</label>
                        <input required type="file" class="form-control mb-3" placeholder="modifier" name="photo"
                            value="{{ $user->photo }}" id="photo">
                    </div>

                    <button type="submit" class="btn btn-primary mb-3">Valider</button>
                </form>


            </div>
            <div class="pt-5">
                <form action="{{ route('destroyUser', $user) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Supprimer le compte</button>
                </form>
            </div>
        </div>
    </main>
@endsection
