<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1 vh-100">
    <div class="title flex-between">
        <h1>Uredi medij <?= $format['tip'] ?></h1>
    </div>

    <hr>

    <form class="row g-3 mt-3" method="POST" action="/formats/update">
        <input type="hidden" name="id" value="<?= $format['id'] ?>">
        <input type="hidden" name="_method" value="PATCH">
        <div class="col-md-6">
            <label for="tip" class="form-label <?= isset($errors['tip']) ? 'is-invalid' : '' ?>">Tip</label>
            <input type="text" class="form-control" id="tip" name="tip" value="<?= $format['tip'] ?>">
            <div class="invalid-feedback"><?= $errors['tip'] ?? '' ?></div>
        </div>
        <div class="col-md-6">
            <label for="koeficijent" class="form-label <?= isset($errors['koeficijent']) ? 'is-invalid' : '' ?>">Koeficijent</label>
            <input type="number" step="0.01" class="form-control" id="koeficijent" name="koeficijent" value="<?= $format['koeficijent'] ?>">
            <div class="invalid-feedback"><?= $errors['koeficijent'] ?? '' ?></div>
        </div>
        <div class="col-12 d-flex mt-4 justify-content-between">
            <a href="/formats" class="btn btn-primary mb-3">Povratak</a>
            <button type="submit" class="btn btn-success mb-3">Spremi</a>
        </div>
    </form>
</main>

<?php include_once base_path('views/partials/footer.php'); ?>