<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazines</title>
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/magazin.css')}}">
</head>
<body>
    <?php
    $conn = new PDO ('mysql:host=localhost;dbname=test' ,'root' ,'' )
    ?>
    <div class="admin-container">
        @include('admin.layout.main-sidebar')
        <div class="main-content">
            @include('admin.layout.main-headerbar')
            <main class="content">
                <?php
                $req = "SELECT id, number , is_public FROM magazines";
                $res=$conn->query($req)->fetchAll(PDO::FETCH_OBJ);
        ?>
        <div class="magazine">
            <h2 class="head2">Liste des Magazines</h2>
                <a href="{{ route('admin.create') }}" class="btn-add">Ajouter un Magazine</a>
        </div>
                <table class="table" id="articlesTable">
                    <thead class="thead">
                        <tr>
                            <th>ID</th>
                            <th>Numéro</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody  class="tbody">
                        <?php
                        foreach($res as $key => $val):
                            ?>
                            <tr>
                                <td><?= $val->id ?></td>
                                <td><?= $val->number ?></td>
                                <td><?= $val->is_public ?></td>
                                <td>
                                    <form method="POST" action="{{ route('admin.magazines.activate', $val->id) }}" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-activate" {{ $val->is_public ? 'disabled' : '' }}>Activer</button>
                                    </form>

                                    <form method="POST" action="{{ route('admin.magazines.deactivate', $val->id) }}" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-deactivate" {{ !$val->is_public ? 'disabled' : '' }}>Désactiver</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
