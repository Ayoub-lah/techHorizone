<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechHorizons - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/responsable/Responsable.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div>
            <a href="/" class="logo">TechHorizons</a>
            <p class="role-title">Responsable de Thème</p>
            <nav>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="{{ route('responsable.dashboard') }}" class="nav-link {{ request()->routeIs('responsable.dashboard') ? 'active' : '' }}">
                            <i data-feather="grid"></i>
                            Tableau de bord
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('responsable.subscriptions') }}" class="nav-link {{ request()->routeIs('responsable.subscriptions') ? 'active' : '' }}">
                            <i data-feather="users"></i>
                            Abonnés
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('responsable.articles') }}" class="nav-link {{ request()->routeIs('responsable.articles') ? 'active' : '' }}">
                            <i data-feather="file-text"></i>
                            Articles
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('responsable.moderation') }}" class="nav-link {{ request()->routeIs('responsable.moderation') ? 'active' : '' }}">
                            <i data-feather="shield"></i>
                            Modération
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Logout Button -->
        <nav>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout">
                    <i data-feather="log-out"></i>
                    Déconnexion
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content') <!-- Article details content will be injected here -->
    </main>

    <script>
        feather.replace();
    </script>
</body>
</html>
