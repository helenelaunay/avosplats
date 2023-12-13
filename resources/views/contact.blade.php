@extends('layouts.app')

@section('content')
    <section id="contact">
        <div>
            <h2>Une question ? Une suggestion ?</h2>
        </div>
        <div>
            <h4>N'hésitez pas à nous contacter :
                <ul>
                    <li>par mail à l'adresse suivante contact@avosplats.fr ou en <a id="link-mailTo"
                            class="text-decoration-none" href="mailto:contact@avosplats.fr">cliquant ici</a></li>
                    <li>via le formulaire suivant</li>
                </ul>
            </h4>
        </div>

        <div id="contactForm" class="container">
            <form action="{{ route('submitFormContact') }}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group mt-2">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
                </div>
                <div class="form-group mt-2">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom">
                </div>

                <div class="form-group mt-2">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="votreadressemail@exemple.fr">
                </div>
                <div class="form-group mt-2">
                    <label for="message">Votre message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Ecrivez votre message ici"></textarea>
                </div>
                <div class="form-group form-check mt-2">
                    <input type="checkbox" class="form-check-input" id="acceptTerms" name="acceptTerms"
                        onchange="enableSubmit()">
                    <label class="form-check-label" for="acceptTerms">J'accepte les termes et conditions</label>
                </div>
                <div class="text-right">
                    <button class="mt-5" type="submit" id="submitBtn" disabled>Envoyer</button>
                </div>
            </form>
        </div>
    </section>
@endsection
