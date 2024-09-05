<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1">
    <div class="title flex-between">
        <h1>Aktivne posudbe</h1>
        <div class="action-buttons">
        </div>
    </div>

    <hr>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Posudba Id</th>
                <th>Kopija Id</th>
                <th>Posudba</th>
                <th>Clan</th>
                <th>Film</th>
                <th>Cijena</th>
                <th>Vrati</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rentals as $rental): ?>
                <tr>
                    <td><?= $rental['pid'] ?></td>
                    <td><?= $rental['kid'] ?></td>
                    <td><?= $rental['datum_posudbe'] ?></td>
                    <td><?= $rental['clan'] ?></td>
                    <td><?= $rental['tip'] ?> - <?= $rental['naslov'] ?></td>
                    <td><?= $rental['cijena_tip_filma'] ?></td>
                    <td>
                        <form action="/rentals/destroy" method="POST" class="d-inline">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="pid" value="<?= $rental['pid'] ?>">
                            <input type="hidden" name="kid" value="<?= $rental['kid'] ?>">
                            <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Oznaci vraceno"><i class="bi bi-arrow-counterclockwise"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</main>

<?php include_once base_path('views/partials/footer.php'); ?>