<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Profil - Kinimi</title>
    <link rel="stylesheet" href="{{ asset("css/global.css") }}">
  </head>
  <body>
    <h1>Profil</h1>

      <h2>{{ $user->name }}</h2>
      <p>Votre niveau :</p>
      <p>Niveau : {{ $user_lvl[0]->lvl }} - Expérience : {{ $user_lvl[0]->exp }} / {{ $user_lvl[0]->exp*100 }}</p>
      <p>Vos badges : </p>
      @foreach($user_badges as $ub)
      <p>Badge {{ $badges[$ub->id_badge][0]->name }} obtenu le {{ $ub->created_at }}</p>
      @endforeach

    <a href="{{ route("home") }}">Retour à l'accueil</a>
  </body>
</html>
