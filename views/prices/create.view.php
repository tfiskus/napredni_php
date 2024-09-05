<?php include_once base_path('views/partials/header.php'); ?>

<main class="container my-3 d-flex flex-column flex-grow-1 vh-100">
    <h1>Dodaj novu cijenu</h1>
    <div class="action-buttons"></div>
    <hr>

    <form class="row g-3 mt-3" action="/prices" method="POST">
        <div class="col-auto">
            <label for="cijena" class="mt-1">Cijena</label>
        </div>
        <div class="col-6">
            <input type="text" class="form-control" id="cijena" name="cijena">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Spremi</button>
        </div>
    </form>

</main>

<?php include_once base_path('views/partials/footer.php'); ?>