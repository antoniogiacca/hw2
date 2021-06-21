<html>
    <head>
        <meta charset="utf-8">
        <title>Luxury Car Catania: Veicoli</title>

        <link rel="stylesheet" href="{{ asset('css/veicoli.css') }}">

        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">

        <script src="{{ asset('js/script.js') }}" defer="true"></script>



        <script type="text/javascript">
            const ADD_ROUTE = "{{route('aggiungi')}}";
        </script>

        <script type="text/javascript">
            const REM_ROUTE = "{{route('rimuovi')}}";
        </script>

        <script type="text/javascript">
            const PREF_ROUTE = "{{route('pref')}}";
        </script>

        <script type="text/javascript">
            const CONT_ROUTE = "{{route('cont')}}";
        </script>
        
        <script type="text/javascript">
            const NEWS_ROUTE = "{{route('news')}}";
        </script>

        <script type="text/javascript">
            const CSFR_TOKEN = '{{ csrf_token() }}';
        </script>

        <script src="{{ asset('js/API_news.js') }}" defer="true"></script>

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
                @if($user['impiegato'])
                <a id='newC' class="button">Aggiungi veicolo</a>

                <section id='modale' class='hidden'>

                    <div class='modal-form'>
                        
                        <div id='close_div'>
                            <h1>Aggiungi Veicolo!</h1>
                            <img id='close' src="{{ asset('immagini/close.png') }}">
                        </div>
                        <form name='nome_form' id='form' method='post' action="{{ route('newC') }}" enctype="multipart/form-data">
                        @csrf
                            <div id="caricaVeicolo">
                                <input type="text" name='titolo' placeholder="Modello"></input>
                                <input type="text" name='prezzo' placeholder="Prezzo"></input>
                                <input type="text" name='descrizione' placeholder="Descrizione"></input>
                                <input type='text' name='immagine' placeholder='Link immagine'></input>
                                <input name='try' type='submit' class='btn' value='Conferma'></input>
                            </div>
                        </form>
                    </div>
                </section>

                <a id='remC' class="button">Rimuovi veicolo</a>

                <section id='modaleRem' class='hidden'>

                    <div class='modal-form'>
                        
                        <div id='close_div'>
                            <h1>Rimuovi Veicolo!</h1>
                            <img id='close' src="{{ asset('immagini/close.png') }}">
                        </div>
                        <form name='rem_form' id='formR' method='post' action="{{ route('remC') }}" enctype="multipart/form-data">
                        @csrf
                            <div id="rimuoviVeicolo">
                                <input type="text" name='titolo' placeholder="Modello"></input>
                                <input name='try' type='submit' class='btn' value='Conferma'></input>
                            </div>
                        </form>
                    </div>
                </section>
        
                @endif

            </h2>

        </header>

        <section>
            <div id="main">
                <h1>i nostri veicoli</h1>
                @if($user==null)
                    <p>Effetua il Login per poter aggiungere e conservare nei preferiti, i veicoli che attirano la tua attenzione</p>
                @else
                    <p>Ciao {{$user['username']}}! Adesso che hai effettuato il login, puoi aggiungere e conservare nei preferiti, i veicoli che attirano la tua attenzione </p>
                @endif
            </div>
            <div id='search'>
                <h2>Ricerca veicoli:</h2>
                <input type="text" placeholder="cerca veicolo">
            </div>
        </section>

        <article id="lista">
            <section id="ricerca" class="tipo, hide">
                <h2>Ricerca</h2>
                <div class="show-case"></div>
            </section>

            <section id="preferiti" class="tipo, hide">
                <h2>I tuoi veicoli preferiti</h2>
                <div class="show-case"></div>
            </section>

            <section id="veicoli" class="tipo"> 
                <h2>Tutti i veicoli</h2>     
                <div class="show-case"></div>
            </section>

        </article>
       
        <section id="news">
            <h4>Cerca una notizia</h4>
            <form id="ricercaN">
                Inserisci parola chiave
                <input type='text' id='key_news'>
                <input type='submit' value='Cerca'>
            </form>
            <div class="articoli"></div>
        </section>

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
                    <div>
                        <img src="{{ asset('immagini/posizione.png') }}">
                        <p>SS192, Km 185, 95100 Catania CT</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
