@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <div>
        <h2 class="text-center mt-5 mb-5">BIENVENUE SUR VOTRE ESPACE ADMINISTRATEUR</h2>

        <nav>
            <ul>
                <div class="d-flex justify-content-around">
                    <li class=""><a href="{{ route('indexRecipeBackOffice') }}">Recettes</a></li>
                    <li><a href="{{ route('indexUserBackOffice') }}">Utilisateurs</a></li>
                </div>
            </ul>
        </nav>

        <div>


            @if (isset($clickedRecipeLink) && $clickedRecipeLink)
                @if (isset($recipesToCheck) && count($recipesToCheck) > 0)
                    @foreach ($recipesToCheck as $recipeToCheck)
                        <h3>Recettes en attente de validation :</h3>
                        <table>
                            <tr>
                                <td>{{ $recipeToCheck->nameRecipe }}</td>
                                <td><img src="{{ asset('photos_des_recettes/' . $recipeToCheck->photoRecipe) }}"
                                        style="width: 300px" alt="image de la recette"></td>
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
                    <h3>Il n'y a pas de recette(s) en attente de validation.</h3>
                @endif

                <table class="table table-striped">
                    @foreach ($recipes as $recipe)
                        @if ($recipe->checkedRecipe == true)
                            <tr>
                                <td class="text-black">{{ $recipe->nameRecipe }}</td>
                                <td><img src="{{ asset('photos_des_recettes/' . $recipe->photoRecipe) }}"
                                        style="width: 300px" alt="image de la recette"></td>
                                <td class="text-black">{{ $recipe->contentRecipe }}</td>
                                <td class="text-black"><a href="{{ route('editRecipeBackOffice', $recipe->id) }}"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                </td>
                                <td class="text-black">
                                    <form id="deleteUserForm" action="{{ route('destroyRecipeBackOffice', $recipe->id) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"><i class="fa-regular fa-trash-can"></i></button>
                                    </form>
                                </td>

                            </tr>
                        @endif
                    @endforeach
                </table>
            @endif



            @if (isset($clickedUserLink) && $clickedUserLink)
                <table class="table table-striped">
                    @foreach ($users as $user)
                        <tr>

                            <td class="text-black">{{ $user->pseudo }}</td>
                            <td class="text-black">{{ $user->email }}</td>
                            <td><img src="{{ asset('photos_de_profil/' . $user->photo) }}" style="width: 100px"
                                    alt="photo de profil"></td>
                            <td>
                                <form class="d-flex" action="{{ route('updateUserBackOffice', $user->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select class="form-select" name="role_id" id="role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                @if ($role->id == $user->role_id) selected @endif>{{ $role->role }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit"><i class="fa-regular fa-pen-to-square"></i></button>
                                </form>

                            </td>
                            <td>
                                <form id="deleteUserForm" action="{{ route('destroyUserBackOffice', $user->id) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                            </td>
                    @endforeach
                    </tr>
                </table>
            @endif
        </div>
    @endsection
