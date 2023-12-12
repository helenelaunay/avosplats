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
                    <li><a href="{{ route('indexRecipeBackOffice') }}">Recettes</a></li>
                    <li><a href="{{ route('indexUserBackOffice') }}">Utilisateurs</a></li>
                </div>
            </ul>
        </nav>

        <div>


            @if (isset($clickedRecipeLink) && $clickedRecipeLink)
                @if (isset($recipesToCheck) && count($recipesToCheck) > 0)
                    @foreach ($recipesToCheck as $recipeToCheck)
                        <h3>Recettes en attente de validation : </h3>
                        <table>
                            <tr>
                                <td>{{ $recipeToCheck->nameRecipe }}</td>
                                <td><img src="{{ asset('photos_des_recettes/' . $recipeToCheck->photoRecipe) }}"
                                        class="w-50" alt=""></td>
                                <td>{{ $recipeToCheck->contentRecipe }}</td>
                                <td>
                                    <form action="{{ route('checkedRecipeBackOffice', $recipeToCheck->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="checkedRecipe" name="checkedRecipe">
                                        <button type="submit">Valider</button>
                                    </form>
                                </td>
                                <td>
                                    <form id="deleteForm"
                                        action="{{ route('destroyRecipeBackOffice', $recipeToCheck->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Refuser</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    @endforeach
                @else
                    <h3>Il n'y a pas de recettes en attente de validation.</h3>
                @endif


                @foreach ($recipes as $recipe)
                    @if ($recipe->checkedRecipe == true)
                        <table class="table table-striped">
                            <tr>
                                <td class="text-black">{{ $recipe->nameRecipe }}</td>
                                <td><img src="{{ asset('photos_des_recettes/' . $recipe->photoRecipe) }}" class="w-50"
                                        alt=""></td>
                                <td class="text-black">{{ $recipe->contentRecipe }}</td>
                                <td class="text-black"><a
                                        href="{{ route('editRecipeBackOffice', $recipe->id) }}">Modifier</a>
                                </td>
                                <td class="text-black">
                                    <form id="deleteUserForm" action="{{ route('destroyRecipeBackOffice', $recipe->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Supprimer</button>
                                    </form>
                                </td>

                            </tr>

                        </table>
                    @endif
                @endforeach
            @else
                <h3>Il n'y a pas de recettes à afficher.</h3>
            @endif




            @if (isset($clickedUserLink) && $clickedUserLink)
                <table class="table table-striped">
                    @foreach ($users as $user)
                        <tr>

                            <td class="text-black">{{ $user->pseudo }}</td>
                            <td class="text-black">{{ $user->email }}</td>
                            <td><img src="{{ asset('photos_de_profil/' . $user->photo) }}" alt=""></td>
                            <td>
                                <form action="{{ route('updateUserBackOffice', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="role_id" id="role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                @if ($role->id == $user->role_id) selected @endif>{{ $role->role }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit">Modifier</button>
                                </form>

                            </td>
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
        </div>
    @endsection
