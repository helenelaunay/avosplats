@extends('layouts.app')

@section('content')

<div><a href="{{ route('createMenu') }}">Créer un menu</a></div>
<div>
    @foreach ($menus as $menu)
    <h3>{{ $menu->nameMenu }}</h3>

    <form action="{{ route ('editMenu', $menu->id)}}">
        <input type="hidden" value="{{ $menu->id }}" name="idMenu">
        <input type="submit" value="Modifier"> 
</form>
<form id="deleteMenuForm" action="{{ route('destroyMenu', $menu->id) }}" method="post">
    @csrf
    @method('delete')
    <input type="hidden" value="{{ $menu->user_id }}" name="user_id">
    <button type="submit" class="btn btn-danger">Supprimer</button>
</form>

        
    @endforeach
</div>
@endsection
