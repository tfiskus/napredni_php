<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1 vh-100">
    <div class="title flex-between">
        <h1><?= $price['tip_filma'] ?></h1>
        <div class="action-buttons">
        </div>
    </div>
    <hr>
    <form class="row g-3 mt-3">
        <div class="col-md-6">
            <label for="tip_filma" class="form-label">Tip filma</label>
            <input type="text" class="form-control" id="tip_filma" name="tip_filma" value="<?= $price['tip_filma'] ?>" disabled>
        </div>
        <div class="col-md-6">
            <label for="cijena" class="form-label">Cijena</label>
            <input type="text" class="form-control" id="cijena" name="cijena" value="<?= $price['cijena'] ?>" disabled>
        </div>
        
    </form>
</main>

<?php include_once base_path('views/partials/footer.php'); ?>