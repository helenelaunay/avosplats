@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">
        <h1>Mon compte</h1>

        <h3 class="pb-3">Modifier mes informations</h3>
        <div class="">
            <div class="row">

                <form class="col-4 mx-auto" action="{{ route('updateUser', $user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="photo">Nouveau pseudo</label>
                        <input type="text" class="form-control mb-3" placeholder="modifier" name="pseudo"
                            value="{{ $user->pseudo }}" id="pseudo">
                    </div>
                    <div class="form-group">
                        <label for="image">Nouvelle photo de profil</label>
                        <input type="file" class="form-control mb-3" placeholder="modifier" name="photo"
                            value="{{ $user->photo }}" id="photo">
                    </div>

                    <button type="submit" class="btn btn-primary mb-3">Valider</button>
                </form>


            </div>
            <div class="pt-5">
                <form id="deleteUserForm" action="{{ route('destroyUser', $user) }}" method="post" onsubmit="return confirmDelete()">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger" onclick="confirmDelete()">Supprimer le compte</button>
                </form>
            </div>
        </div>
    </main>
@endsection
