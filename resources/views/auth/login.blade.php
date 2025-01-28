<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Tech Horizons</title>
    <link rel="stylesheet" href="{{asset('css/loginLogout/login.css')}}">
</head>
<body>
    <header>
        <div class="nav-container">
            <a href="{{url('/')}}" class="logo">TechHorizons</a>
        </div>
    </header>

    <main class="login-container">
        <div class="login-box">
            <div class="login-header">
                <h1>Connexion</h1>
                <p>Accédez à votre espace TechHorizons</p>
            </div>

            <!-- Display error message if user is blocked -->
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <a href="{{ route('password.request') }}" class="forgot-password">Mot de passe oublié ?</a>
                <button type="submit" class="login-button">Se connecter</button>
                <div class="signup-prompt">
                    Pas encore de compte ? <a href="{{ route('register') }}">S'inscrire</a>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; 2024 TechHorizons. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>
