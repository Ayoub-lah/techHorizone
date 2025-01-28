
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<aside class="sidebar" id="sidebar">
    <div class="logo">TechHorizons</div>
    <nav>
        <ul class="nav-links">
            <a href="{{ route('dashboard') }}"><h4>Tableau de bord</h4></a>
        </ul>
    </nav>
</aside>
<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.logo {
    font-size: 1.5rem;
    font-weight: bold;
    color: #3B82F6; /* Bleu vibrant pour attirer l'attention */
    text-decoration: none;
    background: linear-gradient(45deg, #3B82F6, #22C55E); /* Dégradé bleu-vert */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent; /* Effet texte dégradé */
    transition: color 0.3s ease, transform 0.2s ease;
}
.logo:hover {
    transform: scale(1.1); /* Légère animation au survol */
    color: #2563EB; /* Accentuation du bleu */
}

        /* Sidebar */
        .sidebar {
            width: 300px;
            background: rgba(103, 68, 68, 0);
            padding: 2rem ;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            flex-direction: column;

        }

        .sidebar h4{
            font-size: 1rem;
            margin-bottom: 2rem;
            color: #5a52d5; /* Bleu vibrant pour attirer l'attention */
            text-decoration: none;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;

            text-align: left;
        }

        .sidebar a
         {
            display:grid;
            text-decoration: none;
            color: BLACK; /* Texte blanc */
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.1); /* Fond translucide au repos */
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 10px;
        }

        .sidebar a:hover {
            background-color: rgba(46, 125, 50, 0.1); /* Légère surbrillance au survol */
            color: #2e7d32; /* Texte vert */
            font-weight:bold;
       }
        .sidebar .btn-primary {
            background: linear-gradient(45deg, #3B82F6, #22C55E); /* Dégradé bleu-vert */

            color: white;
            text-align: center;
            display: block;
            padding: 0.75rem;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
        }

        .sidebar .btn-primary:hover {
            background-color: #5a52d5;
        }
</style>
@yield('sidebar')