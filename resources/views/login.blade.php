<html>
    <head>
        <meta charset="utf-8"> 
        <title>Luxury Car Catania: Login</title>

        <link rel='stylesheet' href='{{ asset("css/login.css")}}'>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>


        <div id='overlay'></div>    

        <main>
            <div id="header">
                <img src="{{ asset('immagini/logo.png') }}">
                <h1>Effettua il Login</h1>
                <a href="{{ route('home')}}"> 
                    <img id="close" src="{{ asset('immagini/close.png') }}">
                </a>
            </div>

            <form name='nome_form' id='form' method='post' action="{{ route('login') }}">
            @csrf
                <p>
                    <span>Username:</span>
                    <label><input type='text' name='username'></label>
                </p>
                <p>
                    <span>Password:</span>
                    <label><input type='password' name='password'></label>
                </p>
                <label>&nbsp;<input type='submit' class='btn' value='Entra'></label>
            </form>

            <div id='signup'>
                <a href="{{ route('signup')}}">Devi ancora registrarti?</a>
            </div>
 
        </main>
        
    </body>
</html>