<?php

use Core\Database;
use Core\Validator;

if (!isset($_POST['id'] ) || !isset($_POST['_method']) || $_POST['_method'] !== 'PATCH') {
    abort();
}

$db = Database::get();
$genre = $db->query('SELECT * FROM zanrovi WHERE id = ?', [$_POST['id']])->findOrFail();
    
$postData = [
    "ime" => $_POST['zanr'],
];

$rules = [
    'ime' => ['required', 'string', 'max:100', 'unique:zanrovi'],
];

$form = new Validator($rules, $postData);
if ($form->notValid()){
    dd($form->errors());
}

$data = $form->getData();

$sql = "UPDATE zanrovi SET ime = ? WHERE id = ?";
$db->query($sql, [$data['ime'], $genre['id']]);

redirect('genres');