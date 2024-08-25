<?php

use Core\Database;
use Core\ResourceInUseException;

if (!isset($_POST['id']) || !isset($_POST['_method']) || $_POST['_method'] !== 'DELETE') {
    abort();
}

$db = Database::get();

$genre = $db->query('SELECT * FROM zanrovi WHERE id = ?', [$_POST['id']])->findOrFail();

try {
    $db->query('DELETE FROM zanrovi WHERE id = ?', [$genre['id']]);
} catch (ResourceInUseException $e) {
    dd('nemere');
}

redirect('genres');