@extends('layouts.headerErreur')
@section('site')

<div class="container menu" style="margin-top: 50px;">
  <div class="row">
    <div class="col-lg-12">
      <h2>Dommage</h2>

      <p>Tu n'as pas accès à cette page car tu n'as pas les droits nécessaires ! Si tu penses qu'il s'agit d'une erreur, envoie un message aux administrateurs avec le lien de la page.</p>

      <a href="{{ route("home") }}" class="btn btn-success btn-lg  btn-block">Retour à l'accueil</a>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->

@endsection
