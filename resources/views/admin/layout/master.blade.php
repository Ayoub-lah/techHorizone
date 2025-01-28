<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
</head>
<body>
    <div class="admin-container">
        @include('admin.layout.main-sidebar')
        <div class="main-content">
            @include('admin.layout.main-headerbar')
            <main class="content">
                @yield('content')
                <H1 class="hi">Salut Admin</H1>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
