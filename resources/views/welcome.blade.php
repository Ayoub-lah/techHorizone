<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Horizons - Le Futur de la Tech</title>
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
</head>
<header>
            <div class="nav-container">
                <div class="logo">TechHorizons</div>
                <nav class="nav-links">
                    <a href="#">Accueil</a>
                    <a href="#">Technologies</a>
                    <a href="#">Blog</a>
                    <a href="#">À propos</a>
                </nav>

                        <div class="auth-btns">
                <a href="{{ route('login') }}" class="login-btn">Connexion</a>
                <a href="/register" class="signup-btn">S'inscrire</a>
            </div>
 </header>

                    <section class="hero">
                        <div class="hero-content">
                            <div class="hero-text">
                                <h1>L'innovation technologique à portée de main</h1>
                                <p>Explorez les dernières avancées technologiques et rejoignez une communauté passionnée par l'innovation numérique.</p>
                                <div class="cta-buttons">
                                    <a href="#" class="primary-btn">Découvrir</a>
                                    <a href="#" class="secondary-btn">En savoir plus</a>
                                </div>
                            </div>
                            <div class="hero-image">
                                <img src="{{ asset('img/innov.png') }}" alt="Innovation Technologique">
                            </div>
                        </div>
                    </section>

                    <section class="features">
                        <div class="section-title">     
                            

                            <h2>Les Thèmes disponibles</h2>
                            <p>Découvrez nos analyses approfondies sur les technologies émergentes</p>
                        </div>
                        <div class="features-grid">@foreach ($welcome as $theme)
                            <div class="feature-card">
                                <div class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="lock-icon">
                                    <path d="M12 2a5 5 0 00-5 5v4H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2v-9a2 2 0 00-2-2h-2V7a5 5 0 00-5-5zm-3 5a3 3 0 016 0v4H9V7zm3 8a2 2 0 11.001 4.001A2 2 0 0112 15z" />
                                  </svg>
                                  </div>
                                <h3>{{$theme->name}}</h3>
                                <p>{{$theme->description}}</p>
                            </div>
                           
                            @endforeach
                        </div>
                    </section>

                    <section class="latest-articles">
                        <div class="section-title">
                            <h2>Les Magazines disponibles</h2>
                            <p>Les analyses et actualités tech les plus récentes</p>
                        </div>
                        <div class="articles-grid">
                            @foreach ($maga as $magazine)
                            <article class="article-card">
                                <img src="{{asset('img/ac.jpg')}}" alt="Web 3.0">
                                <div class="article-content">
                                    <span class="article-tag">id: {{$magazine->id}}</span>
                                    <h3 class="article-title">Numero du magazine: {{$magazine->number}}</h3>
                                    <p>Découvrez comment le Web 3.0 transforme notre utilisation d'internet...</p>
                                    <a href="{{ url('register')}}" class="btn-lire-plus">Lire plus</a>

                                </div>
                            </article>
                            @endforeach
                          
                        </div>
                    </section>










                    <footer>
                        <div class="footer-content">
                            <div class="footer-section">
                                <h3>À propos</h3>
                                <ul>
                                    <li><a href="#">Notre Vision</a></li>
                                    <li><a href="#">Équipe</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                            <div class="footer-section">
                                <h3>Services</h3>
                                <ul>
                                    <li><a href="#">Newsletter</a></li>
                                    <li><a href="#">Événements</a></li>
                                    <li><a href="#">Formation</a></li>
                                </ul>
                            </div>
                            <div class="footer-section">
                                <h3>Légal</h3>
                                <ul>
                                    <li><a href="#">Confidentialité</a></li>
                                    <li><a href="#">Conditions</a></li>
                                    <li><a href="#">Cookies</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-bottom">
                            <p>&copy; 2024 TechHorizons. Tous droits réservés.</p>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>

<script>
    document.addEventListener('click', function(event) {
        // Empêcher la redirection si l'utilisateur clique sur un lien de la navbar ou du footer
        if (!event.target.closest('.nav-container') && !event.target.closest('footer')) {
            window.location.href = "{{ route('register') }}";
        }
    });
</script>
