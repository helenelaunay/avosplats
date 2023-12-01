    @extends('layouts.app')

    @section('content')
        <section id="hero">
<h1>Retrouvez vos menus et vos recettes en 1 clic sur tous vos écrans</h1>
<a href="{{ route('register') }}">Je m'inscris !</a>
<a href="{{ route('login') }}">Déjà inscrit ? Cliquez ici pour vous connecter</a>
        </section>

        <section id="section-infos">
            <div>
                <div>
                    <div>
                        <h2>Organisez vos menus à la semaine</h2>
                    </div>
                    <div>
                        <ul>
                            <li>Editez simplement votre menu de la semaine en ajoutant une recette ou en la supprimant</li>
                            <li>Remplissez autant de repas que souhaité</li>
                            <li>Planifiez jusqu'à 2 menus sur votre profil</li>
                            <li>Cliquez sur la recette pour la lire</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <div>
                        <img src="" alt="">
                    </div>

                </div>
            </div>

            <div>
                <div>
                    <img src="" alt="">
                </div>
                <div>
                    <div>
                        <h2>Ajoutez vos recettes ou découvrez celles de notre communauté</h2>
                    </div>
                    <div>
                        <p>Retrouvez un large choix de recettes simples et rapides du quotidien ou plus élaborées, 
                            des recettes pour des évènements festifs, etc. </p>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <h2>Accédez à vos menus depuis n'importe où !</h2>
                </div>
                <div>
                    <p>En faisant vos courses, en attendant le bus, à la pause déjeuner au travail ou encore pendant
                         l'activité sportive de votre enfant, consultez votre menu de la semaine sur 
                         votre smartphone, votre tablette ou encore votre ordinateur !</p>
                </div>
                <img src="" alt="">
                <img src="" alt="">
                <img src="" alt="">
            </div>
        </section>
        <section id="section-recipes">
            <div>
                <h2>Les dernières recettes ajoutées</h2>
            </div>
            <div>
                <div>
                    <div><img src="" alt=""></div>
                    <div>Titre de la recette</div>
                </div>
                <div>
                    <div><img src="" alt=""></div>
                    <div>Titre de la recette</div>
                </div>
                <div>
                    <div><img src="" alt=""></div>
                    <div>Titre de la recette</div>
                </div>
                <div>
                    <div><img src="" alt=""></div>
                    <div>Titre de la recette</div>
                </div>
            </div>
            <div>
                <a href="{{ route('register') }}">Découvrez toutes nos recettes</a>
            </div>

        </section>

        <section id="section-contact">
            <div>
                <h2>Une question ? Une suggestion ?</h2>
                <a href="">Contactez-nous !</a>
            </div>
        </section>

        <section id="pre-footer" class="d-flex">
            <div class="d-flex flex-column align-items-center">
                <div><i class="fa-solid fa-hands-holding"></i></div>
                <div><h4>Collaboratif</h4></div>
                <div><p class="text-center">Profitez d’une quantité infinie de combinaison de recettes pour vos menus.</p></div>
            </div>
            <div class="d-flex flex-column align-items-center">
                <div><i class="fa-solid fa-forward-fast"></i></div>
                <div><h4>Gain de temps</h4></div>
                <div><p class="text-center">Retrouvez vos recettes et votre menu de la semaine au même endroit, en un clic.</p></div>
            </div>
            <div class="d-flex flex-column align-items-center">
                <div><i class="fa-solid fa-earth-europe"></i></div>
                <div><h4>Disponible partout</h4></div>
                <div><p class="text-center">A vos plats ! est accessible sur tous vos écrans pour vous simplifier la vie.</p></div>
            </div>
        </section>
        @endsection

