@extends('layouts.header404')
@section('site')

<div class="container menu" style="margin-top: 50px;">
  <div class="row">
    <div class="col-lg-12">
      <h2>Alors, on s'est perdu ?</h2>

      <p>C'est ce qu'on appelle une erreur 404, cette page n'existe pas ! Si tu es arrivé ici en naviguant sur le site, tu peux contacter les administrateurs pour leur signaler le problème.</p>

      <a href="{{ route("home") }}" class="btn btn-success btn-lg  btn-block">Retour à l'accueil</a>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->

@endsection
