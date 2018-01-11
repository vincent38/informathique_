@extends('layouts.header404')
@section('site')

<div class="container menu" style="margin-top: 50px;">
  <div class="row">
    <div class="col-lg-12">
      <h2>Erreur interne</h2>

      <p>Tu es tombé sur une erreur 500 ! Cela veut dire qu'il y'a eu un problème sur le site. Si cette erreur s'affiche trop souvent, tu peux contacter les administrateurs en indiquant comment tu obtiens cette erreur.</p>

      <a href="{{ route("home") }}" class="btn btn-success btn-lg  btn-block">Retour à l'accueil</a>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->

@endsection
