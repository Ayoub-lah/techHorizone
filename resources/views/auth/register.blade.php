<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Tech Horizons</title>

    <link rel="stylesheet" href="{{asset('css/loginLogout/register.css')}}">
</head>

<body>
    <header>
        <div class="nav-container">
            <a href="{{ url('/') }}" class="logo">TechHorizons</a>
        </div>
    </header>
    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="container">
            <div class="auth-card">
                <div class="auth-logo">
                    <a href="/">Registration</a>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="form-label">Nom</label>
                        <input id="name" class="form-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                        <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">
                            S'inscrire
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <a class="link" href="{{ route('login') }}">
                            Déjà inscrit ?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <p>&copy; 2024 TechHorizons. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>
