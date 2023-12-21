@extends('layouts.app')

@section('content')
    <main>
        @if (count($menus) == 0)
            <div id="AddMenuFast" class="d-flex justify-content-center mt-5">
                <a  href="{{ route('createMenu') }}"><i class="fa-solid fa-circle-plus p-3"></i> Créer vite votre menu en cliquant ici</a>
            </div>
                
        @else
            @foreach ($menus as $menu)
                {{-- Affichage du semainier en Desktop --}}
                <div id="semainier">
                    <div id="links-semainier" class="d-flex align-items-center justify-content-end p-3">
                        <a href="{{ route('createMenu') }}"><i class="fa-solid fa-circle-plus p-3"></i></a>
                        <form class="p-3" action="{{ route('editMenu', $menu->id) }}">
                            <input type="hidden" value="{{ $menu->id }}" name="idMenu">
                            <button type="submit"><i class="fa-regular fa-pen-to-square"></i></button>
                        </form>
                        <form class="p-3 pe-5" id="deleteMenuForm" action="{{ route('destroyMenu', $menu->id) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" value="{{ $menu->user_id }}" name="user_id">
                            <button type="submit"><i class="fa-regular fa-trash-can"></i></button>
                        </form>
                    </div>

                    <h1 class="text-center text-white pb-5" id="semainier-title">{{ $menu->nameMenu }}</h1>

                    <div id="semainier-meals">
                        <div class="div1">
                            <p class="text-center text-white">LUNDI</p>
                        </div>
                        <div class="div2">
                            <p class="text-center text-white">MARDI</p>
                        </div>
                        <div class="div3">
                            <p class="text-center text-white">MERCREDI</p>
                        </div>
                        <div class="div4">
                            <p class="text-center text-white">JEUDI</p>
                        </div>
                        <div class="div5">
                            <p class="text-center text-white">VENDREDI</p>
                        </div>
                        <div class="div6">
                            <p class="text-center text-white">SAMEDI</p>
                        </div>
                        <div class="div7">
                            <p class="text-center text-white">DIMANCHE</p>
                        </div>
                        <div class="div8">
                            <p class="text-center text-white m-0">Midi</p>
                        </div>
                        <div class="div9">
                            <p class="text-center text-white m-0">Soir</p>
                        </div>



                        @foreach ($mealsMidi as $mealMidi)
                            @if ($mealMidi->menu_id == $menu->id)
                                <div class="{{ $mealMidi->nameMeal }} box-meal">
                                    @if ($mealMidi->recipe_id != null)
                                        <div class="d-flex h-100">
                                            <p class="m-0 text-center">{{ $mealMidi->recipe->nameRecipe }}</p>
                                        </div>

                                        <div class="d-flex justify-content-end align-self-end">
                                            <form action="{{ route('updateRecipeMeal') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="{{ $mealMidi->id }}" name="meal_id">
                                                <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                <button type="submit"><i class="fa-solid fa-rectangle-xmark"
                                                        style="color: #d30d0d; font-size: 25px;"></i></button>
                                            </form>

                                        </div>
                                    @else
                                        <div class="d-flex align-items-center justify-content-center">
                                            <form action="{{ route('indexRecipe') }}">
                                                <input type="hidden" value="{{ $mealMidi->id }}" name="meal_id">
                                                <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                <button type="submit"><i class="fa-solid fa-plus"
                                                        style="font-size: 60px;"></i></button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach



                        @foreach ($mealsSoir as $mealSoir)
                            @if ($mealSoir->menu_id == $menu->id)
                                <div class="{{ $mealSoir->nameMeal }} box-meal">
                                    @if ($mealSoir->recipe_id != null)
                                        <div class="d-flex justify-content-end h-100">
                                            <p class="m-0 text-center">{{ $mealSoir->recipe->nameRecipe }}</p>
                                        </div>


                                        <div class="d-flex justify-content-end align-self-end" style="">
                                            <form action="{{ route('updateRecipeMeal') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="{{ $mealSoir->id }}" name="meal_id">
                                                <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                <button type="submit"><i class="fa-solid fa-rectangle-xmark"
                                                        style="color: #d30d0d; font-size: 25px;"></i></button>
                                            </form>

                                        </div>
                                    @else
                                        <div class="d-flex align-items-center justify-content-center">
                                            <form action="{{ route('indexRecipe') }}">
                                                <input type="hidden" value="{{ $mealSoir->id }}" name="meal_id">
                                                <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                <button type="submit"><i class="fa-solid fa-plus"
                                                        style="font-size: 60px;"></i></button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach



                    </div>
                </div>

                <!-- Affichage du semainier en Tablette/Mobile  -->
                <div id="semainier-mobile">
                    <div id="links-semainier" class="d-flex align-items-center justify-content-end p-3">
                        <a href="{{ route('createMenu') }}"><i class="fa-solid fa-circle-plus p-3"></i></a>
                        <form class="p-3" action="{{ route('editMenu', $menu->id) }}">
                            <input type="hidden" value="{{ $menu->id }}" name="idMenu">
                            <button type="submit"><i class="fa-regular fa-pen-to-square"></i></button>
                        </form>
                        <form class="p-3 pe-5" id="deleteMenuForm" action="{{ route('destroyMenu', $menu->id) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" value="{{ $menu->user_id }}" name="user_id">
                            <button type="submit"><i class="fa-regular fa-trash-can"></i></button>
                        </form>
                    </div>

                    <h1 class="text-center text-white pb-5" id="semainier-title">{{ $menu->nameMenu }}</h1>
                    <div id="semainier-meals">
                        {{-- Lundi --}}
                        <div class="semainier-jour">
                            <div class="jour">
                                <p class="text-center text-white">LUNDI</p>
                            </div>
                            <div class="jour-midi">
                                <p class="text-center text-white">Midi</p>
                            </div>
                            <div class="jour-soir">
                                <p class="text-center text-white">Soir</p>
                            </div>
                            @foreach ($mealsLundi as $key => $mealLundi)
                                @if ($mealLundi->menu_id == $menu->id)
                                    <div
                                        class="recipe{{ $key + 1 }} box-meal d-flex flex-column-reverse justify-content-center">
                                        @if ($mealLundi->recipe_id != null)
                                            <div class="h-100">
                                                <p class="m-0 text-center">{{ $mealLundi->recipe->nameRecipe }}</p>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <form action="{{ route('updateRecipeMeal') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $mealLundi->id }}" name="meal_id">
                                                    <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                    <button type="submit"><i class="fa-solid fa-rectangle-xmark"
                                                            style="color: #d30d0d; font-size: 50px;"></i></button>
                                                </form>

                                            </div>
                                        @else
                                            <div class="d-flex align-items-center justify-content-center">
                                                <form action="{{ route('indexRecipe') }}">
                                                    <input type="hidden" value="{{ $mealLundi->id }}" name="meal_id">
                                                    <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                    <button type="submit"><i class="fa-solid fa-plus"
                                                            style="font-size: 60px;"></i></button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- Mardi --}}
                        <div class="semainier-jour">
                            <div class="jour">
                                <p class="text-center text-white">MARDI</p>
                            </div>
                            <div class="jour-midi">
                                <p class="text-center text-white">Midi</p>
                            </div>
                            <div class="jour-soir">
                                <p class="text-center text-white">Soir</p>
                            </div>
                            @foreach ($mealsMardi as $key => $mealMardi)
                                @if ($mealMardi->menu_id == $menu->id)
                                    <div
                                        class="recipe{{ $key + 1 }} box-meal d-flex flex-column-reverse justify-content-center">
                                        @if ($mealMardi->recipe_id != null)
                                            <div class="h-100">
                                                <p class="m-0 text-center">{{ $mealMardi->recipe->nameRecipe }}</p>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <form action="{{ route('updateRecipeMeal') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $mealMardi->id }}" name="meal_id">
                                                    <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                    <button type="submit"><i class="fa-solid fa-rectangle-xmark"
                                                            style="color: #d30d0d; font-size: 25px;"></i></button>
                                                </form>

                                            </div>
                                        @else
                                            <div class="d-flex align-items-center justify-content-center">
                                                <form action="{{ route('indexRecipe') }}">
                                                    <input type="hidden" value="{{ $mealMardi->id }}" name="meal_id">
                                                    <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                    <button type="submit"><i class="fa-solid fa-plus"
                                                            style="font-size: 60px;"></i></button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- Mercredi --}}
                        <div class="semainier-jour">
                            <div class="jour">
                                <p class="text-center text-white">MERCREDI</p>
                            </div>
                            <div class="jour-midi">
                                <p class="text-center text-white">Midi</p>
                            </div>
                            <div class="jour-soir">
                                <p class="text-center text-white">Soir</p>
                            </div>
                            @foreach ($mealsMercredi as $key => $mealMercredi)
                                @if ($mealMercredi->menu_id == $menu->id)
                                    <div
                                        class="recipe{{ $key + 1 }} box-meal d-flex flex-column-reverse justify-content-center">
                                        @if ($mealMercredi->recipe_id != null)
                                            <div class="h-100">
                                                <p class="m-0 text-center">{{ $mealMercredi->recipe->nameRecipe }}</p>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <form action="{{ route('updateRecipeMeal') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $mealMercredi->id }}"
                                                        name="meal_id">
                                                    <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                    <button type="submit"><i class="fa-solid fa-rectangle-xmark"
                                                            style="color: #d30d0d; font-size: 25px;"></i></button>
                                                </form>

                                            </div>
                                        @else
                                            <div class="d-flex align-items-center justify-content-center">
                                                <form action="{{ route('indexRecipe') }}">
                                                    <input type="hidden" value="{{ $mealMercredi->id }}"
                                                        name="meal_id">
                                                    <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                    <button type="submit"><i class="fa-solid fa-plus"
                                                            style="font-size: 60px;"></i></button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- Jeudi --}}
                        <div class="semainier-jour">
                            <div class="jour">
                                <p class="text-center text-white">JEUDI</p>
                            </div>
                            <div class="jour-midi">
                                <p class="text-center text-white">Midi</p>
                            </div>
                            <div class="jour-soir">
                                <p class="text-center text-white">Soir</p>
                            </div>
                            @foreach ($mealsJeudi as $key => $mealJeudi)
                                @if ($mealJeudi->menu_id == $menu->id)
                                    <div
                                        class="recipe{{ $key + 1 }} box-meal d-flex flex-column-reverse justify-content-center">
                                        @if ($mealJeudi->recipe_id != null)
                                            <div class="h-100">
                                                <p class="m-0 text-center">{{ $mealJeudi->recipe->nameRecipe }}</p>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <form action="{{ route('updateRecipeMeal') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $mealJeudi->id }}" name="meal_id">
                                                    <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                    <button type="submit"><i class="fa-solid fa-rectangle-xmark"
                                                            style="color: #d30d0d; font-size: 25px;"></i></button>
                                                </form>

                                            </div>
                                        @else
                                            <div class="d-flex align-items-center justify-content-center">
                                                <form action="{{ route('indexRecipe') }}">
                                                    <input type="hidden" value="{{ $mealJeudi->id }}" name="meal_id">
                                                    <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                    <button type="submit"><i class="fa-solid fa-plus"
                                                            style="font-size: 60px;"></i></button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- Vendredi --}}
                        <div class="semainier-jour">
                            <div class="jour">
                                <p class="text-center text-white">VENDREDI</p>
                            </div>
                            <div class="jour-midi">
                                <p class="text-center text-white">Midi</p>
                            </div>
                            <div class="jour-soir">
                                <p class="text-center text-white">Soir</p>
                            </div>
                            @foreach ($mealsVendredi as $key => $mealVendredi)
                                @if ($mealVendredi->menu_id == $menu->id)
                                    <div
                                        class="recipe{{ $key + 1 }} box-meal d-flex flex-column-reverse justify-content-center">
                                        @if ($mealVendredi->recipe_id != null)
                                            <div class="h-100">
                                                <p class="m-0 text-center">{{ $mealVendredi->recipe->nameRecipe }}</p>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <form action="{{ route('updateRecipeMeal') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $mealVendredi->id }}"
                                                        name="meal_id">
                                                    <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                    <button type="submit"><i class="fa-solid fa-rectangle-xmark"
                                                            style="color: #d30d0d; font-size: 25px;"></i></button>
                                                </form>

                                            </div>
                                        @else
                                            <div class="d-flex align-items-center justify-content-center">
                                                <form action="{{ route('indexRecipe') }}">
                                                    <input type="hidden" value="{{ $mealVendredi->id }}"
                                                        name="meal_id">
                                                    <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                    <button type="submit"><i class="fa-solid fa-plus"
                                                            style="font-size: 60px;"></i></button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- Samedi --}}
                        <div class="semainier-jour">
                            <div class="jour">
                                <p class="text-center text-white">SAMEDI</p>
                            </div>
                            <div class="jour-midi">
                                <p class="text-center text-white">Midi</p>
                            </div>
                            <div class="jour-soir">
                                <p class="text-center text-white">Soir</p>
                            </div>
                            @foreach ($mealsSamedi as $key => $mealSamedi)
                                @if ($mealSamedi->menu_id == $menu->id)
                                    <div
                                        class="recipe{{ $key + 1 }} box-meal d-flex flex-column-reverse justify-content-center">
                                        @if ($mealSamedi->recipe_id != null)
                                            <div class="h-100">
                                                <p class="m-0 text-center">{{ $mealSamedi->recipe->nameRecipe }}</p>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <form action="{{ route('updateRecipeMeal') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $mealSamedi->id }}" name="meal_id">
                                                    <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                    <button type="submit"><i class="fa-solid fa-rectangle-xmark"
                                                            style="color: #d30d0d; font-size: 25px;"></i></button>
                                                </form>

                                            </div>
                                        @else
                                            <div class="d-flex align-items-center justify-content-center">
                                                <form action="{{ route('indexRecipe') }}">
                                                    <input type="hidden" value="{{ $mealSamedi->id }}" name="meal_id">
                                                    <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                    <button type="submit"><i class="fa-solid fa-plus"
                                                            style="font-size: 60px;"></i></button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- Dimanche --}}

                        <div class="semainier-jour">
                            <div class="jour">
                                <p class="text-center text-white">DIMANCHE</p>
                            </div>
                            <div class="jour-midi">
                                <p class="text-center text-white">Midi</p>
                            </div>
                            <div class="jour-soir">
                                <p class="text-center text-white">Soir</p>
                            </div>
                            @foreach ($mealsDimanche as $key => $mealDimanche)
                                @if ($mealDimanche->menu_id == $menu->id)
                                    <div
                                        class="recipe{{ $key + 1 }} box-meal d-flex flex-column-reverse justify-content-center">
                                        @if ($mealDimanche->recipe_id != null)
                                            <div class="h-100">
                                                <p class="m-0 text-center">{{ $mealDimanche->recipe->nameRecipe }}</p>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <form action="{{ route('updateRecipeMeal') }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="{{ $mealDimanche->id }}"
                                                        name="meal_id">
                                                    <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                    <button type="submit"><i class="fa-solid fa-rectangle-xmark"
                                                            style="color: #d30d0d; font-size: 25px;"></i></button>
                                                </form>

                                            </div>
                                        @else
                                            <div class="d-flex align-items-center justify-content-center">
                                                <form action="{{ route('indexRecipe') }}">
                                                    <input type="hidden" value="{{ $mealDimanche->id }}"
                                                        name="meal_id">
                                                    <input type="hidden" value="{{ $menu->id }}" name="menu_id">
                                                    <button type="submit"><i class="fa-solid fa-plus"
                                                            style="font-size: 60px;"></i></button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>








                    </div>
                </div>
            @endforeach
        @endif
        <div id="link-myRecipes" class="mb-5 d-flex justify-content-center">
            <a href="{{ route('recipeByUser', $user->id) }}"><i class="fa-solid fa-utensils pe-4"></i> Mes recettes</a>
        </div>

    </main>
@endsection
