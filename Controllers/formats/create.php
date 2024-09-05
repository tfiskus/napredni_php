<?php

use Core\Session;

$pageTitle = 'Mediji';

$errors = Session::get('errors');

require base_path('views/formats/create.view.php');