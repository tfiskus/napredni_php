<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1">
    <div class="title flex-between">
        <h1>Filmovi</h1>
        <div class="action-buttons">
            <a href="/movies/create" type="submit" class="btn btn-primary">Dodaj novi</a>
        </div>
    </div>

    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Naslov</th>
                <th>Godina</th>
                <th>Žanr</th>
                <th>Tip Filma</th>
                <th class="table-action-col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $movie): ?>
                <tr>
                    <td><?= $movie['id'] ?></td>
                    <td><?= $movie['naslov'] ?></td>
                    <td><?= $movie['godina'] ?></td>
                    <td><?= $movie['zanr'] ?></td>
                    <td><?= $movie['tip_filma'] ?></td>
                    <td>
                        <a href="#" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Movie"><i class="bi bi-pencil"></i></a>
                        <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Movie"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php include_once base_path('views/partials/footer.php'); ?>