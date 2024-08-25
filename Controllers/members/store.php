<?php

use Core\Database;
use Core\Session;
use Core\Validator;

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    dd('Unsupported method!');
}

$rules = [
    'ime' => ['required', 'string', 'max:50', 'min:2'],
    'prezime' => ['required', 'string','max:50'],
    'adresa' => ['string','max:100'],
    'telefon' => ['phone','max:15'],
    'email' => ['required', 'email', 'max:50', 'unique:clanovi'],
];

$form = new Validator($rules, $_POST);
if ($form->notValid()){
    Session::flash('errors', $form->errors());
    goBack();
}

$data = $form->getData();
$db = Database::get();

// Genereate next clanski_broj
$sql = "SELECT clanski_broj FROM clanovi ORDER BY id DESC LIMIT 1";
$clanskiBroj = $db->query($sql)->find();
$clanskiBroj = str_replace('CLAN','', $clanskiBroj['clanski_broj']);
$clanskiBroj = intval($clanskiBroj);
$clanskiBroj = 'CLAN' . ++$clanskiBroj;

$sql = "INSERT INTO clanovi (ime, prezime, adresa, telefon, email, clanski_broj) VALUES (:ime, :prezime, :adresa, :telefon, :email, :clanski_broj)";
$db->query($sql, [
    'ime' => $data['ime'],
    'prezime' => $data['prezime'],
    'adresa' => $data['adresa'],
    'telefon' => $data['telefon'],
    'email' => $data['email'],
    'clanski_broj' => $clanskiBroj
]);

Session::flash('message', [
    'type' => 'success',
    'message' => "Uspjesno kreiran clan '{$data['ime']} {$data['prezime']}'."
]);

redirect('members');