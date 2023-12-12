@extends('layouts.app')

@section('content')
<div><h2>Une question ? Une suggestion ?</h2></div>
<div><h4>Contactez-nous via ce formulaire :</h4></div>
    <div>
        <form action="{{ route('submitFormContact') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group form-row">
                <div class="col">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Nom">
                </div>
                <div class="col">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" placeholder="Prénom">
                </div>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" placeholder="votreadressemail@exemple.fr">
            </div>
            <div class="form-group">
                <label for="message">Votre message</label>
                <textarea class="form-control" id="message" rows="5" placeholder="Ecrivez votre message ici"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
@endsection
