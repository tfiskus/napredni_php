<?php

use Core\Database;

$db = Database::get();

$sql = "SELECT * FROM zanrovi ORDER BY id";
$genres = $db->query($sql)->all();

$sql = "SELECT * FROM cjenik ORDER BY id";
$prices = $db->query($sql)->all();

require base_path('views/movies/create.view.php');