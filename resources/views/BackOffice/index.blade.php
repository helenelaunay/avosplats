@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <div>
        <h2>BIENVENUE SUR VOTRE ESPACE ADMINISTRATEUR</h2>
        <nav>
            <ul>
                <div>
                    <li><a href="{{ route('indexUserBackOffice') }}">Utilisateurs</a></li>
                    <li><a href="{{ route('indexRecipeBackOffice') }}">Recettes</a></li>
                    <li><a href="#">Tags</a></li>
                </div>
                @if (isset($clickedUserLink) && $clickedUserLink)
                    <table class="table table-striped">
                        @foreach ($users as $user)
                            <tr>

                                <td class="text-black">{{ $user->pseudo }}</td>
                                <td class="text-black">{{ $user->email }}</td>
                                <td><img src="{{ asset('photos_de_profil/' . $user->photo) }}" alt="">
                                <td>
                                <td class="text-black">
                                    <form id="deleteUserForm" action="{{ route('destroyUserBackOffice', $user->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Supprimer le compte</button>
                                    </form>
                                </td>
                        @endforeach


                        </tr>

                    </table>
                @endif

                @if (isset($clickedRecipeLink) && $clickedRecipeLink)
                    <table class="table table-striped">
                        @foreach ($recipes as $recipe)
                            <tr>
                                <td class="text-black">{{ $recipe->nameRecipe }}</td>
                                <td><img src="{{ asset('photos_des_recettes/' . $recipe->photoRecipe) }}" class="w-50"
                                        alt=""></td>
                                <td class="text-black">{{ $recipe->contentRecipe }}</td>
                                <td class="text-black"><a
                                        href="{{ route('editRecipeBackOffice', $recipe->id) }}">Modifier</a></td>
                                <td class="text-black">
                                    <form id="deleteUserForm" action="{{ route('destroyRecipeBackOffice', $recipe->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Supprimer</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </table>
                @endif

            </ul>
        </nav>

    </div>


@endsection
