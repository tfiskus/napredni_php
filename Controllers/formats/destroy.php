<?php

use Core\Database;
use Core\ResourceInUseException;
use Core\Validator;
use Core\Session;

if (!isset($_POST['id']) || !isset($_POST['_method']) || $_POST['_method'] !== 'DELETE') {
    abort();
}

$id = $_POST['id'];
$db = Database::get();
$format = $db->query("SELECT * from mediji WHERE id = :id", ['id' => $id])->findOrFail();

try {
    $db->query("DELETE from mediji WHERE id = :id", ['id' => $id]);
} catch (ResourceInUseException $exception) {
    Session::flash('message', [
        'type' => 'danger',
        'message' => "Ne mozete obrisati medij {$format['tip']} prije nego obrisete sve kopije koje koriste ovaj medij"
    ]);
    goBack();
}

Session::flash('message', [
    'type' => 'success',
    'message' => "Uspjesno obrisan medij {$format['tip']}"
]);

redirect('formats');