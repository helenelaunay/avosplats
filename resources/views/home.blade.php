@extends('layouts.app')

@section('content')
    <div id="semainier">
        @foreach ($menus as $menu)
            <div id="links-semainier" class="d-flex align-items-center justify-content-end p-3">
                <a href="{{ route('createMenu') }}"><i class="fa-solid fa-circle-plus"></i></a>
                <form class="ps-3" action="{{ route('editMenu', $menu->id) }}">
                    <input type="hidden" value="{{ $menu->id }}" name="idMenu">
                    <button type="submit"><i class="fa-regular fa-pen-to-square"></i></button>
                </form>
                <form class="ps-3" id="deleteMenuForm" action="{{ route('destroyMenu', $menu->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" value="{{ $menu->user_id }}" name="user_id">
                    <button type="submit"><i class="fa-regular fa-trash-can"></i></button>
                </form>
            </div>


            <h2 class="text-center" id="semainier-title">{{ $menu->nameMenu }}</h2>
        @endforeach
        @foreach ($menu->meals as $meal)
            <div id="semainier-meals">
                <div class="day-header"></div>
                <div class="day-header">Lundi</div>
                <div class="day-header">Mardi</div>
                <div class="day-header">Mercredi</div>
                <div class="day-header">Jeudi</div>
                <div class="day-header">Vendredi</div>
                <div class="day-header">Samedi</div>
                <div class="day-header">Dimanche</div>

                <div class="meal-type-header"></div>
                <div class="meal-type">Midi</div>
                <div class="meal-content">
                    <!-- Votre code ici -->
                    @if ($meal->recipe_id != null)
                        <p>{{ $meal->recipe->nameRecipe }}</p>
                        <form action="{{ route('updateRecipeMeal') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $meal->id }}" name="meal_id">
                            <button type="submit"><i class="fa-solid fa-rectangle-xmark"
                                    style="color: #d30d0d;"></i></button>
                        </form>
                    @else
                        <form action="{{ route('indexRecipe') }}">
                            <input type="hidden" value="{{ $meal->id }}" name="meal_id">
                            <button type="submit"><i class="fa-solid fa-plus"></i></button>
                        </form>
                    @endif
                </div>
                <div class="meal-type">Soir</div>
                <div class="meal-content">
                    <!-- Votre code ici -->
                    @if ($meal->recipe_id != null)
                        <p>{{ $meal->recipe->nameRecipe }}</p>
                        <form action="{{ route('updateRecipeMeal') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $meal->id }}" name="meal_id">
                            <button type="submit"><i class="fa-solid fa-rectangle-xmark"
                                    style="color: #d30d0d;"></i></button>
                        </form>
                    @else
                        <form action="{{ route('indexRecipe') }}">
                            <input type="hidden" value="{{ $meal->id }}" name="meal_id">
                            <button type="submit"><i class="fa-solid fa-plus"></i></button>
                        </form>
                    @endif
                </div>

        @endforeach


  
    </div>
    {{-- @if ($meal->recipe_id != null)
                <p>{{ $meal->recipe->nameRecipe }}</p>
                <form action="{{ route('updateRecipeMeal') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{ $meal->id }}" name="meal_id">
                    <button type="submit"><i class="fa-solid fa-rectangle-xmark" style="color: #d30d0d;"></i></button>
                </form>
            @else
                <form action="{{ route('indexRecipe') }}">
                    <input type="hidden" value="{{ $meal->id }}" name="meal_id">
                    <button type="submit"><i class="fa-solid fa-plus"></i>
                    </button>
                </form>
            @endif
        </div>
        @endforeach
    </div> --}}

    <div><a href="{{ route('recipeByUser', $user->id) }}">Mes recettes</a></div>
@endsection
