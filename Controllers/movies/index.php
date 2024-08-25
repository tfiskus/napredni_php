<?php

use Core\Database;

$db = Database::get();

$sql = "SELECT
f.id,
f.naslov,
f.godina,
z.ime AS zanr,
c.tip_filma
from
    filmovi f
    JOIN cjenik c ON f.cjenik_id = c.id
    JOIN zanrovi z ON f.zanr_id = z.id
ORDER BY
    f.id";

$movies = $db->query($sql)->all();

$pageTitle = 'Filmovi';

require base_path('views/movies/index.view.php');