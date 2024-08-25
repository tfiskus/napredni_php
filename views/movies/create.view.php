<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1 vh-100">
    <div class="title flex-between">
        <h1>Dodaj novi Film</h1>
        <div class="action-buttons">
        </div>
    </div>
    <hr>
    <form class="row g-3 mt-3" action="/movies/store" method="POST">
        <div class="col-md-6">
            <label for="title" class="form-label">Naslov</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Naslov" required>
        </div>
        <div class="col-md-6">
            <label for="year" class="form-label">Godina</label>
            <input type="text" class="form-control" id="year" name="year" placeholder="Godina" required>
        </div>
        <div class="col">
            <label for="movie_year" class="form-label ps-1">Žanr</label>
            <select class="form-select" aria-label="Default select example" name="genre">
                <option selected>Odaberite zanr</option>
                <?php foreach ($genres as $genre): ?>
                    <option value="<?= $genre['id'] ?>"><?= $genre['ime'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col">
            <label for="movie_year" class="form-label ps-1">Cjenik</label>
            <select class="form-select" aria-label="Default select example" name="price">
                <option selected>Odaberite cijenu</option>
                <?php foreach ($prices as $priceItem): ?>
                    <option value="<?= $priceItem['id'] ?>"><?= $priceItem['tip_filma'] . " - Cijena " .  $priceItem['cijena'] . " EUR - Zakasnina " . $priceItem['zakasnina_po_danu'] . " EUR"?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary mb-3">Spremi</button>
        </div>
    </form>
</main>

<?php include_once base_path('views/partials/footer.php'); ?>