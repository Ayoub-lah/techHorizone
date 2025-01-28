
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Horizons - Le Futur de la Tech</title>
   <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
   <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }
    
    :root {
        --primary-color: #6366f1;
        --secondary-color: #4f46e5;
        --background-color: #fafafa;
        --text-color: #1f2937;
        --light-text: #6b7280;
    }
    
    body {
        background-color: var(--background-color);
        color: var(--text-color);
        line-height: 1.6;
    }
    
    /* Header Style */
    header {
        background: white;
        padding: 1rem;
        position: fixed;
        width: 100%;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }
    
    .nav-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 1rem;
    }
    
    .logo {
        font-size: 1.5rem;
        font-weight: 800;
        background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: -1px;
    }
    
    .nav-links {
        display: flex;
        gap: 2rem;
    }
    
    .nav-links a {
        color: var(--text-color);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        transition: color 0.2s;
    }
    
    .nav-links a:hover {
        color: var(--primary-color);
    }
    
    .auth-btns {
        display: flex;
        gap: 1rem;
    }
    
    .auth-btns a {
        padding: 0.5rem 1.25rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.2s;
    }
    
    .login-btn {
        color: var(--primary-color);
        border: 1px solid var(--primary-color);
    }
    
    .signup-btn {
        background: var(--primary-color);
        color: white;
    }
    
    /* Hero Section */
    .hero {
        min-height: 100vh;
        padding: 8rem 1rem 4rem;
        display: flex;
        align-items: center;
        background: linear-gradient(to bottom, #fff, var(--background-color));
    }
    
    .hero-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
        padding: 0 1rem;
    }
    
    .hero-text h1 {
        font-size: 3.5rem;
        line-height: 1.2;
        margin-bottom: 1.5rem;
        font-weight: 800;
        letter-spacing: -1px;
    }
    
    .hero-text p {
        font-size: 1.125rem;
        color: var(--light-text);
        margin-bottom: 2rem;
    }
    
    .cta-buttons {
        display: flex;
        gap: 1rem;
    }
    
    .cta-buttons a {
        padding: 0.875rem 2rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-weight: 500;
        transition: transform 0.2s;
    }
    
    .primary-btn {
        background: var(--primary-color);
        color: white;
    }
    
    .secondary-btn {
        border: 1px solid var(--primary-color);
        color: var(--primary-color);
    }
    
    /* Features Section */
    .features {
        padding: 6rem 1rem;
        background: white;
    }
    
    .section-title {
        text-align: center;
        margin-bottom: 4rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .section-title h2 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        font-weight: 700;
        letter-spacing: -1px;
    }
    
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }
    
    .feature-card {
        padding: 2rem;
        border-radius: 1rem;
        background: var(--background-color);
        transition: transform 0.2s;
    }
    
    .feature-icon {
        font-size: 2rem;
        margin-bottom: 1rem;
    }
    
    /* Articles Section */
    .latest-articles {
        padding: 6rem 1rem;
    }
    
    .articles-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }
    
    .article-card {
        background: white;
        border-radius: 1rem;
        overflow: hidden;
        transition: transform 0.2s;
    }
    
    .article-content {
        padding: 1.5rem;
    }
    
    .article-tag {
        background: var(--primary-color);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 1rem;
        font-size: 0.875rem;
        display: inline-block;
        margin-bottom: 1rem;
    }
    
    .article-title {
        font-size: 1.25rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    
    /* Footer */
    footer {
        background: white;
        padding: 4rem 1rem 2rem;
        border-top: 1px solid #e5e7eb;
    }
    
    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 3rem;
        padding: 0 1rem;
    }
    
    .footer-section h3 {
        color: var(--text-color);
        margin-bottom: 1.5rem;
        font-weight: 600;
    }
    
    .footer-section ul {
        list-style: none;
    }
    
    .footer-section li {
        margin-bottom: 0.75rem;
    }
    
    .footer-section a {
        color: var(--light-text);
        text-decoration: none;
        transition: color 0.2s;
    }
    
    .footer-section a:hover {
        color: var(--primary-color);
    }
    
    .footer-bottom {
        max-width: 1200px;
        margin: 3rem auto 0;
        padding-top: 1.5rem;
        border-top: 1px solid #e5e7eb;
        text-align: center;
        color: var(--light-text);
    }
    
    @media (max-width: 768px) {
        .hero-content {
            grid-template-columns: 1fr;
            text-align: center;
        }
    
        .cta-buttons {
            justify-content: center;
        }
    
        .nav-links {
            display: none;
        }
    }
    </style>
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
        <a href="/login" class="login-btn">Connexion</a>
        <a href="/register" class="signup-btn">S'inscrire</a>
    </div>
</header>
<br>
<br>
<br>
@yield('content')

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