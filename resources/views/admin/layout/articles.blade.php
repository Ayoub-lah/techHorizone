<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/article.css')}}">
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

                @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

                <?php
                $req = "SELECT id, title , state ,is_public , magazine_id FROM articles";
                $res=$conn->query($req)->fetchAll(PDO::FETCH_OBJ);
                ?>

                <div class="search-bar">
                    <h2 class="head2">Liste des Articles</h2>
                    <input type="text" id="searchInput" oninput="filterByTitle()" placeholder="Search by title...">
                </div>

                <table class="table" id="articlesTable">
                    <thead class="thead">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Etat</th>
                            <th>Status</th>
                            <th>N° Magazine</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <?php
                    foreach($res as $key => $val):
                        ?>
                            <tr>
                                <td><?= $val->id ?></td>
                                <td><?= $val->title ?></td>
                                <td><?= $val->state ?></td>
                                <td><?= $val->is_public ?></td>
                                <td>
                                    <form method="POST" action="{{ route('admin.articles.updateMagazine', $val->id) }}" class="magazine-form">
                                        @csrf
                                        @method('PATCH')
                                        <select name="magazine_id" class="magazine-select" onchange="this.form.submit()">
                                            <?php
                                            // Fetch all magazines from the database
                                            $magazines = $conn->query("SELECT id FROM magazines")->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($magazines as $magazine):
                                            ?>
                                                <option value="<?= $magazine->id ?>" <?= $magazine->id == $val->magazine_id ? 'selected' : '' ?>>
                                                    <?= $magazine->id ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('admin.articles.activate', $val->id) }}" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-activate" {{ $val->is_public === 'active' ? 'disabled' : '' }}>Activer</button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.articles.deactivate', $val->id) }}" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-deactivate" {{ $val->is_public === 'hold' ? 'disabled' : '' }}>Désactiver</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                            endforeach ;
                        ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
