<?php

use Core\Database;

$db = Database::get();

$formats = $db->query("SELECT * FROM mediji")->all();

require base_path('views/formats/index.view.php');

