@extends('layouts.header404')
@section('site')

<div class="container menu" style="margin-top: 50px;">
  <div class="row">
    <div class="col-lg-12">
      <h2>Service en maintenance</h2>

      <p>Nous sommes en train de mettre à jour Kinimi pour ajouter des trucs cools et enlever les erreurs. Kinimi revient très vite !</p>

      <a href="{{ route("home") }}" class="btn btn-success btn-lg  btn-block">Retour à l'accueil</a>
    </div> <!-- col -->
  </div> <!-- row -->
</div> <!-- container -->

@endsection
