<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login</title>
<link rel="stylesheet" href="{{ asset('static/main.css') }}" /></head>
<body>

    <img src="{{ asset('img/logo.svg') }}" alt="Naterra" class="logo" >

    <div class="moon-box">
        <div class="moon">
            <div class="crater c1"></div>
            <div class="crater c2"></div>
            <div class="crater c3"></div>
            <div class="crater c4"></div>
            <div class="crater c5"></div>
            <div class="crater c6"></div>
            <div class="crater c7"></div>
        </div>
    </div>

    <div class="form">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="nom">Nom</label>
            <input 
                type="text" 
                id="nom" 
                name="name" 
                value="{{ old('name') }}" 
                placeholder="Ex: Marta" 
                required 
                autofocus 
            />

            <label for="cognom">Cognom</label>
            <input 
                type="text" 
                id="cognom" 
                name="lastname" 
                value="{{ old('lastname') }}" 
                placeholder="Ex: Pons" 
                required 
            />

            <label for="email">Correu electrònic</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                value="{{ old('email') }}" 
                placeholder="marta@naterrra.cat" 
                required 
            />

            <label for="pass">Contrasenya</label>
            <input 
                type="password" 
                id="pass" 
                name="password" 
                placeholder="Mínim 8 caràcters" 
                required 
                autocomplete="new-password" 
            />
            
            <button type="submit" class="btn">Crear compte</button>
        </form>

        <div class="footer">
            Ja tens compte? <a href="{{ route('login') }}">Inicia sessió</a>
        </div>
    </div>

</body>
</html>