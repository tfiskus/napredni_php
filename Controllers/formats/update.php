<?php

use Core\Database;
use Core\Validator;
use Core\Session;

if (!isset($_POST['id']) || !isset($_POST['_method']) || $_POST['_method'] !== 'PATCH') {
    abort();
}

$id = $_POST['id'];
$db = Database::get();
$format = $db->query("SELECT * from mediji WHERE id = :id", ['id' => $id])->findOrFail();

// validacija
$rules = [
    'tip'         => ['required', 'string', 'min:2', 'max:100', 'unique:mediji,' . $id],
    'koeficijent' => ['required', 'numeric', 'gt:0', 'lt:100']
];

$form = new Validator($rules, $_POST);
if ($form->notValid()) {
    Session::flash('errors', $form->errors());
    goBack();
}

$data = $form->getData();

$sql = "UPDATE mediji SET tip = :tip, koeficijent = :koeficijent WHERE id = :id";
$db->query($sql, [
    'id' => $id,
    'tip' => $data['tip'],
    'koeficijent' => $data['koeficijent'],
]);

Session::flash('message', [
    'type' => 'success',
    'message' => "Uspjesno uredjeni podaci o mediju {$data['tip']}",
]);

redirect('formats');