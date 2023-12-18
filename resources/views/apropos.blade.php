@extends('layouts.app')

@section('content')
<section id="a-propos" class="p-5">
<p>
Combien de personnes avez-vous déjà vu avec un menu de la semaine accroché à leur frigo ? Et combien avez-vous déjà entendu dire, alors qu'ils ne sont pas chez eux : 
<i>“oh zut, je ne sais plus ce que j’ai prévu de préparer pour ce soir !”</i> ?</p> 
<p class="pt-5 text-center">Avec <span>A vos plats</span> , cela n'arrivera plus ! </p>
<div id="apropos-box" class="d-flex flex-row-reverse align-items-start m-5">
    <p class="text-left pt-5 ps-5">Il était temps de pouvoir retrouver votre menu, sur votre smartphone, votre tablette ou votre ordinateur, partout, où que vous soyez !</p>
    <img src="{{ asset('images/a-propos.jpg') }}" alt="tablette affichant une recette dans la cuisine" style="width: 200px">
</div>

<p class="pt-5">Bon, ok, pour on vous entend déjà dire qu'un petit outil simple comme un document de texte ou un organisateur aurait pu suffir. 
Sauf que chaque semaine, c’est la même chose : <i>qu’est ce qu’on va manger ? de quoi as-tu envie ? On a fait quoi la dernière fois déjà qui avait bien plu aux enfants ?
    J’ai pas d’idées pour cette semaine... On mange toujours la même chose j’en ai marre !</i> </p>

<p class="pt-5">Grâce à <span>A vos plats !</span>, vous allez pouvoir partager vos recettes avec notre communauté. Inversement, vous pouvez profiter de recettes très basiques ou encore de 
recettes élaborées pour des repas de fêtes par exemple. Vous trouverez une multitude de plats, et si celui que vous avez l’habitude de faire n’est pas présent, 
ajoutez facilement et simplement votre recette !</p>
<div class="d-flex justify-content-center pt-5">
    <a class="text-decoration-none text-center" href="{{ route('register') }}">Rejoignez notre communauté !</a>
</div>


</section>
@endsection