<?php

use Core\Database;
use Core\Session;
use Core\ResourceInUseException;

if (!isset($_POST['id'] ) || !isset($_POST['_method']) || $_POST['_method'] !== 'DELETE') {
    abort();
}

$db = Database::get();

$sql = 'SELECT * from clanovi WHERE id = :id';
$member = $db->query($sql, ['id' => $_POST['id']])->findOrFail();

$sql = "DELETE from clanovi WHERE id = :id";

try {
    $db->query($sql, ['id' => $_POST['id']]);
} catch (ResourceInUseException $e) {
    Session::flash('message', [
        'type' => 'danger',
        'message' => "Ne mozete obrisati clana {$member['ime']} {$member['prezime']} prije nego obrisete njegove posudbe."
    ]);
    goBack();
}

Session::flash('message', [
    'type' => 'success',
    'message' => "Uspjesno obrisan clan '{$member['ime']} {$member['prezime']}'."
]);

redirect('members');