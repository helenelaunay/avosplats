@extends('layouts.app')

@section('content')

<div><a href="{{ route('createMenu') }}">Créer un menu <i class="fa-solid fa-circle-plus"></i></a></div>
<div>
    @foreach ($menus as $menu)
    <h3>{{ $menu->nameMenu }}</h3>
    @foreach ($menu->meals as $meal)
    <p>{{ $meal->nameMeal }}</p>
@endforeach
    <form action="{{ route ('editMenu', $menu->id)}}">
        <input type="hidden" value="{{ $menu->id }}" name="idMenu">
        <button type="submit"><i class="fa-regular fa-pen-to-square"></i></button> 
</form>
<form id="deleteMenuForm" action="{{ route('destroyMenu', $menu->id) }}" method="post">
    @csrf
    @method('delete')
    <input type="hidden" value="{{ $menu->user_id }}" name="user_id">
    <button type="submit"><i class="fa-regular fa-trash-can"></i></button>
</form>
<i class="fa-regular fa-folder-open"></i> 

        
    @endforeach
</div>
@endsection
