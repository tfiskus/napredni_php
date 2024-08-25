<?php

use Core\Database;
use Core\Validator;

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    dd('Unsupported method!');
}

$postData = [
    'ime' => $_POST['zanr'] ?? null
];

$rules = [
    'ime' => ['required', 'string', 'max:100', 'unique:zanrovi'],
];

$form = new Validator($rules, $postData);
if ($form->notValid()){
    dd($form->errors());
}

$data = $form->getData();

$db = Database::get();

$sql = "INSERT INTO zanrovi (ime) VALUES (:ime)";
$db->query($sql, ['ime' => $data['ime']]);

redirect('genres');