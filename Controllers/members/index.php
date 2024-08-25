<?php

use Core\Database;
use Core\Session;

$db = Database::get();

$sql = "SELECT * from clanovi ORDER BY id";
$members = $db->query($sql)->all();

$pageTitle = 'Clanovi';

$message = Session::all('message');
Session::unflash();

require base_path('views/members/index.view.php');