@extends('layouts.header404')
@section('site')

<div class="container" id="menu">
  <div class="row">
    <div class="col-lg-12">
      <h2>Alors, on s'est perdu ?</h2>

      <p>C'est ce qu'on appelle une erreur 404 ! Cette page n'existe pas ! Si tu es arrivé ici en naviguant sur le site, tu peux contacter les administrateurs pour leur signaler le problème.</p>

      <a href="{{ route("home") }}" class="menu-bouton btn btn-success btn-lg">Retour à l'accueil</a>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->

@endsection
