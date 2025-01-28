<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin/dash.css') }}">
    <link rel="stylesheet" href="{{asset('css/admin/admin.css')}}">
</head>
<body>
    <div class="admin-container">
        @include('admin.layout.main-sidebar')
        <div class="main-content">
            @include('admin.layout.main-headerbar')
            <main class="content">
                <div class="stats-grid">
                    <div class="stat-card">
                        <h3 class="stat-title">Total admin</h3>
                        <p class="stat-value">{{ $totalAdmins }}</p>
                    </div>
                    <div class="stat-card">
                        <h3 class="stat-title">Total abonnes</h3>
                        <p class="stat-value">{{ $totalCustomers }}</p>
                    </div>
                    <div class="stat-card">
                        <h3 class="stat-title">Total responsable</h3>
                        <p class="stat-value">{{ $totalResponsables }}</p>
                    </div>
                    <div class="stat-card">
                        <h3 class="stat-title">Total des articles</h3>
                        <p class="stat-value">{{ $totaleArticles }}</p>
                    </div>
                </div>
                <div class="stats-grid">
                    <div class="stat-card">
                        <h3 class="stat-title">Total des thèmes </h3>
                        <p class="stat-value">{{  $totaleThemes }}</p>
                    </div>
                    <div class="stat-card">
                        <h3 class="stat-title">Total des Magazines </h3>
                        <p class="stat-value">{{ $totaleMagazines }}</p>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
