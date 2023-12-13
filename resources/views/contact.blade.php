@extends('layouts.app')

@section('content')
<div><h2>Une question ? Une suggestion ?</h2></div>
<div><h4>Contactez-nous via ce formulaire :</h4></div>
<p>ou par mail à l'adresse suivante : contact@avosplats.fr ou en cliquant <a href="mailto:contact@avosplats.fr">ici</a></p>
    <div>
        <form action="{{ route('submitFormContact') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group form-row">
                <div class="col">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
                </div>
                <div class="col">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom">
                </div>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="votreadressemail@exemple.fr">
            </div>
            <div class="form-group">
                <label for="message">Votre message</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Ecrivez votre message ici"></textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="acceptTerms" name="acceptTerms" onchange="enableSubmit()">
                <label class="form-check-label" for="acceptTerms">J'accepte les termes et conditions</label>
            </div>
            
            <button type="submit" id="submitBtn" disabled class="btn btn-primary">Envoyer</button>
        </form>        
    </div>
@endsection
