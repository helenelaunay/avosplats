    @extends('layouts.app')

    @section('content')
        <section id="hero">
            <h1 class="text-center">Retrouvez vos menus et vos recettes en 1 clic sur tous vos écrans</h1>
            <div id="hero-links" class="d-flex flex-column align-items-center justify-content-around">
                <a id="hero-link-register" class="text-decoration-none text-center" href="{{ route('register') }}">Je m'inscris
                    !</a>
                <a id="hero-link-login" class="text-decoration-none text-center" href="{{ route('login') }}">Déjà inscrit ?
                    Cliquez ici pour vous connecter</a>
            </div>

        </section>

        <section id="section-infos">
            <div id="section-infos-container1">
                <div id="section-infos-bloc1">
                    <div>
                        <h2 id="bloc1-title">Organisez vos menus à la semaine</h2>
                    </div>
                    <div id="bloc1-image-mobile">
                        <img src="{{ asset('images/screen-menu.webp') }}" class="img-fluid" alt="">
                    </div>
                    <div id="bloc1-text">
                        <ul>
                            <li>Editez simplement votre menu de la semaine en ajoutant une recette ou en la supprimant</li>
                            <li>Remplissez autant de repas que souhaité</li>
                            <li>Planifiez jusqu'à 2 menus sur votre profil</li>
                            <li>Cliquez sur la recette pour la lire</li>
                        </ul>
                    </div>
                </div>
                <div id="bloc1-image-desktop">
                    <img src="{{ asset('images/screen-menu.webp') }}" class="img-fluid" alt="écran du profil utilisateur">
                </div>
            </div>

            <div id="section-infos-container2-desktop">

                <img src="{{ asset('images/recette-infos.webp') }}" class="img-fluid" alt="cuisiner">

                <div id="section-infos-bloc2" class="d-flex flex-column justify-content-around">
                    <div>
                        <h2>Ajoutez vos recettes ou découvrez celles de notre communauté</h2>
                    </div>
                    <div>
                        <p>Retrouvez un large choix de recettes simples et rapides du quotidien ou plus élaborées,
                            des recettes pour des évènements festifs, etc. </p>
                    </div>
                </div>
            </div>

            <div id="section-infos-container2-mobile">
                <div id="section-infos-bloc2-mobile" class="d-flex flex-column justify-content-around">
                    <h2 class="text-center mt-3 mb-4 ps-2 pe-2">Ajoutez vos recettes ou découvrez celles de notre communauté
                    </h2>
                    <img src="{{ asset('images/recette-infos.webp') }}" class="img-fluid" alt="cuisiner">
                    <p class="text-center mt-5 mb-3 ps-2 pe-2">Retrouvez un large choix de recettes simples et rapides du
                        quotidien ou plus élaborées,
                        des recettes pour des évènements festifs, etc. </p>
                </div>
            </div>

            <div id="section-infos-container3">
                <div>
                    <h2>Accédez à vos menus depuis n'importe où !</h2>
                </div>
                <div>
                    <p class="text-center">En faisant vos courses, en attendant le bus, à la pause déjeuner au travail ou
                        encore pendant
                        l'activité sportive de votre enfant, consultez votre menu de la semaine sur
                        votre smartphone, votre tablette ou encore votre ordinateur !</p>
                </div>
                <div id="mockups-box">
                    <div>
                        <img id="imgMobile" src="{{ asset('images/MockUpMobile.png') }}" alt="MockUp Mobile">
                    </div>
                    <div>
                        <img id="imgTablet" src="{{ asset('images/MockUpTablet.png') }}" alt="MockUp Tablet">
                    </div>
                    <div>
                        <img src="{{ asset('images/MockUpDesktop.png') }}" alt="MockUp Desktop">
                    </div>

                </div>
            </div>
        </section>
        <section id="section-recipes">
            <div>
                <h2 class="text-center">Les dernières recettes ajoutées</h2>
            </div>
            <div class="recipes-container pb-5">
                @foreach ($latestRecipes as $key => $recipe)
                    <img class="imgRecipe{{ $key + 1 }} img-fluid"
                        src="{{ asset('photos_des_recettes/' . $recipe->photoRecipe) }}"
                        style="object-fit: cover; width: 100%; height: 100%;" alt="Photo de la recette">
                    <p class="titleRecipe{{ $key + 1 }} text-center m-0">{{ $recipe->nameRecipe }}</p>
                @endforeach
            </div>

            <div class="recipes-container-mobile">
                @foreach ($latestRecipes as $key => $recipe)
                    <img class="mobileImgRecipe{{ $key + 1 }} img-fluid"
                        src="{{ asset('photos_des_recettes/' . $recipe->photoRecipe) }}"
                        style="object-fit: cover; width: 100%; height: 100%;" alt="Photo de la recette">
                    <p class="mobileTitleRecipe{{ $key + 1 }} text-center m-0">{{ $recipe->nameRecipe }}</p>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                <a class="text-center" href="{{ route('register') }}">Découvrez toutes nos recettes</a>
            </div>
        </section>

        <section id="section-contact">
            <div>
                <h2>Une question ? Une suggestion ?</h2>
                <a href="{{ route('editFormContact') }}">Contactez-nous !</a>
            </div>
        </section>

        <section id="pre-footer">
            <div id="container-pre-footer">
                <div><i class="fa-solid fa-hands-holding"></i></div>
                <div>
                    <h4>Collaboratif</h4>
                </div>
                <div>
                    <p class="text-center">Profitez d’une quantité infinie de combinaison de recettes pour vos menus.</p>
                </div>
            </div>
            <div id="container-pre-footer">
                <div><i class="fa-solid fa-forward-fast"></i></div>
                <div>
                    <h4>Gain de temps</h4>
                </div>
                <div>
                    <p class="text-center">Retrouvez vos recettes et votre menu de la semaine au même endroit, en un clic.
                    </p>
                </div>
            </div>
            <div id="container-pre-footer">
                <div><i class="fa-solid fa-earth-europe"></i></div>
                <div>
                    <h4>Disponible partout</h4>
                </div>
                <div>
                    <p class="text-center">A vos plats ! est accessible sur tous vos écrans pour vous simplifier la vie.</p>
                </div>
            </div>
        </section>
    @endsection
