<?php

use Core\Database;
use Core\Validator;

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    dd('Unsupported method!');
}
    
$postData = [
    "naslov" => $_POST['title'] ?? null,
    "godina" => $_POST['year'] ?? null,
    "zanr" => $_POST['genre'] ?? null,
    "cjenik" => $_POST['price'] ?? null,
];

$rules = [
    'naslov' => ['required', 'string', 'max:100', 'min:2'],
    'godina' => ['required', 'numeric','max:4'],
    'zanr' => ['required', 'numeric', 'exists:zanrovi,id'],
    'cjenik' => ['required', 'numeric', 'exists:cjenik,id'],
];

$form = new Validator($rules, $postData);
if ($form->notValid()){
    dd($form->errors());
}

$data = $form->getData();

$db = Database::get();

$sql = "INSERT INTO filmovi (naslov, godina, zanr_id, cjenik_id) VALUES (:naslov, :godina, :zanr_id, :cjenik_id)";

$db->query($sql, [
    'naslov' => $data['naslov'],
    'godina' => $data['godina'],
    'zanr_id' => $data['zanr'],
    'cjenik_id' => $data['cjenik']
]);

redirect('movies');