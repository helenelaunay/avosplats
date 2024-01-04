@extends ('layouts.app')



@section('content')
    <main class="container">

        <div class="card">
            <div class="card-header">{{ __('Modifier mes informations') }}</div>


            <div class="row">

                <form id="form" class="col-8 mx-auto" action="{{ route('updateUser', $user) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mt-2">
                        <label for="photo">Nouveau pseudo</label>
                        <input type="text" class="form-control mb-3" placeholder="modifier" name="pseudo"
                            value="{{ $user->pseudo }}" id="pseudo">
                    </div>
                    <div class="form-group mt-2">
                        <label for="email">Nouvelle adresse e-mail</label>
                        <input type="text" class="form-control mb-3" placeholder="modifier" name="email"
                            value="{{ $user->email }}" id="email">
                    </div>
                    <div id="form-input-image" class="form-group d-flex flex-column mt-2">
                        <label for="image">Nouvelle photo de profil</label>
                        <img class="mb-2" src="{{ asset('photos_de_profil/' . $user->photo) }}" alt="Photo de profil">
                        <input type="file" class="form-control mb-3" name="photo" id="photo">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-3">Valider</button>
                    </div>
                </form>
            </div>
            
            <div class="col-11 mx-auto mt-5 d-flex justify-content-end">
                <form id="deleteUserForm" action="{{ route('destroyUser', $user) }}" method="post"
                    onsubmit="return confirmDelete()">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger mb-5" onclick="confirmDelete()">Supprimer mon
                        compte</button>
                </form>
            </div>

        </div>
    </main>
@endsection
