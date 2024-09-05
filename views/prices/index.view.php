<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1">
    <div class="title flex-between">
        <h1>Cjenik</h1>
        <div class="action-buttons">
            <a href="/prices/create" type="submit" class="btn btn-primary">Dodaj novu cijenu</a>
        </div>
    </div>

    <hr>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>TIp filma</th>
                <th>cijena</th>
                <th class="table-action-col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prices as $prices): ?>
                <tr>
                    <td><?= $prices['id'] ?></td>
                    <td><a href="/prices/show?id=<?= $prices['id'] ?>"><?= $prices['ime'] ?></a></td>
                    <td>
                        <a href="/price/edit?id=<?= $price['id'] ?>" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Uredi Zanr"><i class="bi bi-pencil"></i></a>
                        <form id="delete-form" class="hidden d-inline" method="POST" action="/prices/destroy">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?= $price['id'] ?>">
                            <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Obrisi cijenu"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php include_once base_path('views/partials/footer.php'); ?>