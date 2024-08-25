<?php

use Core\Session;

$pageTitle = 'Clanovi';

$errors = Session::all('errors');
Session::unflash();

require base_path('views/members/create.view.php');