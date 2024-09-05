<?php

use Core\Database;
use Core\Session;
use Core\Validator;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    dd("Unsuported method for this route!");
}

$rules = [
    'tip'         => ['required', 'string', 'min:2', 'max:100', 'unique:mediji'],
    'koeficijent' => ['required', 'numeric', 'gt:0', 'lt:100']
];

$form = new Validator($rules, $_POST);

if ($form->notValid()) {
    Session::flash('errors', $form->errors());
    goBack();
}

$data = $form->getData();
$db = Database::get();

$sql = "INSERT INTO mediji (tip, koeficijent) VALUES (:tip, :koef)";

$db->query($sql, [
    'tip'  => $data['tip'],
    'koef' => $data['koeficijent'],
]);

Session::flash('message', [
    'type' => 'success',
    'message' => "Uspjesno kreiran novi medij {$data['tip']}"
]);

redirect('formats');