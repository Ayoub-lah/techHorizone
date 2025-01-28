<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utlisateurs</title>
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
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
                $req = "SELECT id, name, email , status , role FROM users";
                $res=$conn->query($req)->fetchAll(PDO::FETCH_OBJ);
        ?>

        <div class="search-bar">
            <h2 class="head2">Tout les utilisateurs </h2>
            <input type="text" id="searchInput" oninput="filterByName()" placeholder="Search by name...">
        </div>

        <table class="table" id="subscribersTable">
            <thead class="thead">
                <tr>
                    <th>Nom</th><th>Email</th><th>status</th><th>Role</th><th>Action</th>
                </tr>
            </thead>
            <tbody class="tbody">
                <?php
                    foreach($res as $key => $val):
                        ?>
                            <tr>
                                <td><?= $val->name ?></td>
                                <td><?= $val->email ?></td>
                                <td><?= $val->status ?></td>
                                <td>
                                    <form method="POST" action="{{ route('admin.users.updateRole', $val->id) }}" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <select name="role" onchange="this.form.submit()">+
                                            <option value="1" <?= $val->role == 1 ? 'selected' : '' ?>>Responsable</option>
                                            <option value="2" <?= $val->role == 2 ? 'selected' : '' ?>>Abonné </option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('admin.users.destroy', $val->id) }}" onsubmit="return confirm('Are you sure you want to delete this user?');" >
                                        @csrf
                                        @method('DELETE')
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <input type="submit" class="sup" name="delete" value="supprimer">
                                        </div>
                                    </form>
                                    <form method="POST" action="{{ route('admin.users.block', $val->id) }}" onsubmit="return confirm('Are you sure you want to block this user?');">
                                        @csrf
                                        @method('PATCH')
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <input type="submit" class="bloquer" name="block" value="bloquer">
                                        </div>
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
