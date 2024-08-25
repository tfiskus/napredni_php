<?php

use Core\Database;
use Core\Session;

if (!isset($_GET['id'])) {
    abort();
}

$db = Database::get();

$sql = "SELECT * from clanovi WHERE id = :id";
$member = $db->query($sql, ['id' => $_GET['id']])->findOrFail();

$pageTitle = "Uredi Clana";

$errors = Session::all('errors');
Session::unflash();

require base_path('views/members/edit.view.php');