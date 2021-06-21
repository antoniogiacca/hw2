<?php
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Luxury Car Catania</title>
    
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" >
    
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <script src="{{ asset('js/API_maps.js') }}" defer="true"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVZgZR-PCxaGJaIUzAp3eZ3XoE6AJUFzQ&callback=initMap&libraries=&v=weekly" async></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    
  </head>
  
  <body>
    <header>
      <div id="overlay"></div>
      <nav>
        <div id="logo">
          <img src="{{ asset('immagini/logo.png') }}">
          Luxury Car
        </div>
        <div id="links1">
          <a href="{{ route('home') }}" class="button">Home</a>
          <a href="{{ route('home') }}#details2" class="button">Marchi Veicoli</a>
          <a href="{{ route('home') }}#main" class="button">Servizi</a>
        </div>
        <div id="links"> 
          @if($user==null)
            <a href="{{ route('login') }}" class='button'>Login</a>
            <a href="{{ route('signup') }}" class='button'>Iscriviti</a>
          @else
            <a href="{{ route('logout') }}" class='button'>Logout</a>
          @endif
          <a href="{{ route('home') }}#info" class="button">Contatti</a>
        </div>

        <div id="menu">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </nav>
      
      <h1>
        <strong>Change your car, Change your life </strong>
      </h1>
      <h2>
        <a href="{{ route('veicoli') }}" class="button">Visualizza tutti i veicoli</a>
      </h2>
    </header>
    
    <section>
      <div id='main'>
        @if($user!=null)
          <p>Benvenuto {{$user['username']}} !</p>
        @endif
        <h1>Ogni tuo desiderio, può essere soddisfatto</h1>
        <p>La concessioniaria più grande della provincia.</br>Nuovo e usato garantito con il supporto costante di venditori qualificati, esperti e sopratutto appassionati. </p>
      </div>
      <div id='details'>
        <div>
          <img src="{{ asset('immagini/prestito.png') }}">
          <h1>Prestito</h1> 
          <p> Attraverso la spiegazione dettagliata dei nostri consulenti, potrai avere l'auto dei tuoi sogni rateizzando il costo. La presenza di più piani permette l'adattamento a qualsiasi esigenza </p>
        </div>
        <div>
          <img src="{{ asset('immagini/km_garantiti.png') }}">
          <h1>Km garantiti</h1>
          <p>Oltre ai veicoli di nuova immatricolazione, offriamo anche una vasta gamma di veicoli usati. Quest'ultimi sono dotati di una certificazione che attesta i km veri del veicolo, assicurando all'acquirente sicurezza e affidabilità</p>
        </div>
      </div>

      <div id='details2'>
        <div>
          <img src="{{ asset('immagini/audi.png') }}">
          <h1>Audi</h1> 
        </div>
        <div>
          <img src="{{ asset('immagini/bmw.png') }}">
          <h1>Bmw</h1> 
        </div>
        <div>
          <img src="{{ asset('immagini/alfaromeo.png') }}">
          <h1>Alfa Romeo</h1> 
        </div>
        <div>
          <img src="{{ asset('immagini/fiat.png') }}">
          <h1>Fiat</h1> 
        </div>
      </div>
    </section>

    <article>
      <h3>Raggiungici facilmente!</h3>
      <div id="map"></div>
    </article>
    
    <footer>
      <div>
        <h1>Antonio Giacca O46002131</h1>
        <h2>INFO</h2>
        <div id='info'>
          <div>
            <img src="{{ asset('immagini/instagram.png') }}">
            <p>@Luxury_Car</p>
          </div>
          <div>
            <img src="{{ asset('immagini/facebook.png') }}">
            <p>Luxury Car Catania</p>
          </div>
          <div id="posizione">
            <img src="{{ asset('immagini/posizione.png') }}">
            <p>SS192, Km 185, 95100 Catania CT</p>
          </div>
        </div>
      </div>
    </footer>


  </body>
</html>