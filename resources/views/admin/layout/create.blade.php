
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Magazine</title>
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="{{asset('css/admin/create.css')}}">
</head>
<body>
    <div class="admin-container">
        @include('admin.layout.main-sidebar')
        <div class="main-content">
            @include('admin.layout.main-headerbar')
            <main class="content">
                <h2>Ajouter un Magazine</h2>
                <form method="POST" action="{{ route('admin.magazines.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="number">Numéro du Magazine</label>
                        <input type="number" id="number" name="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="is_public">Statut</label>
                        <select id="is_public" name="is_public" class="form-control" required>
                            <option value="1">Public</option>
                            <option value="0">Non Public</option>
                        </select>
                    </div>
                    <button type="submit" class="btn">Ajouter</button>
                </form>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
