<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechHorizons - Tableau de bord</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            line-height: 1.6;
            color: #1a202c;
            background-color: #f7fafc;
        }

       /* Header */
       header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #ffffff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            right: -2px;
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

        /* Cercle pour l'icône */
        .profile-circle {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #3B82F6, #22C55E); /* Dégradé moderne bleu-vert */
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 1.5rem;
    font-weight: bold; /* Accentuer la lettre */
    cursor: pointer;
    position: relative;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Ombre pour donner de la profondeur */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animation fluide */
}
.profile-circle:hover {
    transform: scale(1.1); /* Légère augmentation de taille au survol */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* Accentuation de l'ombre au survol */
}

.profile-circle:active {
    transform: scale(0.95); /* Réduction légère pour un effet "bouton pressé" */
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2); /* Ombre réduite au clic */
}
        /* Menu déroulant */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 60px;
            right: 2rem;
            background-color: white;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            z-index: 100;
        }

        .dropdown-menu a,
        .dropdown-menu button {
            text-decoration: none;
            color: #1a202c;
            display: block;
            padding: 1rem;
            text-align: left;
            transition: background-color 0.3s ease;
            background: none;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .dropdown-menu a:hover,
        .dropdown-menu button:hover {
            background-color: #f7fafc;
        }

        /* Affichage du menu */
        .profile-circle:hover + .dropdown-menu,
        .dropdown-menu:hover {
            display: block;
        }
        /* Main Content */
        main {
            margin-top: 80px;
            padding: 2rem;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .dashboard-header {
            margin-bottom: 2rem;
        }

        .dashboard-header h1 {
            font-size: 2.5rem;
            color: #1a202c;
            margin-bottom: 0.5rem;
        }

        .dashboard-header p {
            color: #4a5568;
            font-size: 1.1rem;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .dashboard-card {
            background: #ffffff;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .dashboard-card h2 {
            color: #2d3748;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #6c63ff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #5a52d5;
        }

       
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <a href="/" class="logo">TechHorizons</a>
        <div>
            <!-- Cercle du profil affichant la première lettre du nom -->
            <div class="profile-circle" title="Profil">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="dropdown-menu">
                <a href="/notifications">Notifications</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            </div>
        </div>
    </header>
</body>
</html>
@yield('content2')