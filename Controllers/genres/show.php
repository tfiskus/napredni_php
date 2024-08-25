<?php

use Core\Database;

if (!isset($_GET['id'])) {
    abort();
}

$db = Database::get();

$sql = 'SELECT * from zanrovi WHERE id = :id';

$genre = $db->query($sql, ['id' => $_GET['id']])->findOrFail();

require base_path('views/genres/show.view.php');