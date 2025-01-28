<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h2>Admin</h2>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li><a href="{{ route('admin.dash') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.users') }}">Utilisateurs</a></li>
            <li><a href="{{ route('admin.articles') }}">Articles</a></li>
            <li><a href="{{ route('admin.magazines')}}">Magazines</a></li>
        </ul>
    </nav>
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
