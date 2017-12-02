@extends('layouts.headerHome')
@section('site')

    <p class="paragraph">Description Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
       do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
        sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
        mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur
        adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
         laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
         in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
          pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
          culpa qui officia deserunt mollit anim id est laborum.</p>



   <div class="container main-menu">
     <div class="row row-eq-height">
       <div class="col-md-6 menu-maths">
         <h2 class="menu-title">Mathématiques</h2>
         <p class="menu-desc">On a des supers exos de maths avec des histoires et tout et tout, et même des exos classiques sans histoire, parfait pour réviser ! Allez viens, on est bien !</p>
         <a href="{{ route("informatique")}}" class="menu-bouton btn btn-primary btn-lg">Accéder aux exercices</a>
       </div> <!-- menu-maths -->
       <div class="col-md-6 menu-info">
         <h2 class="menu-title">Informatique</h2>
         <p class="menu-desc">Si tu cherches des idées pour t'échapper de classe, ce jeu est parfait pour te l'apprendre ! On va te transformer en délinquant, espèce de sale racaille ! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
         <a href="{{ route("informatique")}}" class="menu-bouton btn btn-primary btn-lg">Accéder à Escape-Colle</a>
       </div> <!-- menu-info -->
     </div> <!-- row -->
   </div>

@endsection
