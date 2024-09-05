<?php

use Controllers\genres\GenresController;
use Controllers\members\MembersController;
use Controllers\HomeController;
use Controllers\DashboardController;
use Controllers\LoginController;
use Controllers\RegisterController;
use Core\Router;

/** @var Router $router */
$router->get('/', [HomeController::class, 'index']);
$router->get('/dashboard', [DashboardController::class, 'index', 'auth']);

$router->get('/register', [RegisterController::class, 'create', 'guest']);
$router->post('/register', [RegisterController::class, 'store', 'guest']);

$router->get('/login', [LoginController::class, 'create']);
$router->post('/login', [LoginController::class, 'store']);
$router->delete('/logout', [LoginController::class, 'logout']);

$router->get('/genres', [GenresController::class, 'index']);
$router->get('/genres/show', [GenresController::class, 'show']);
$router->get('/genres/create', [GenresController::class, 'create']);
$router->post('/genres', [GenresController::class, 'store']);
$router->get('/genres/edit', [GenresController::class, 'edit']);
$router->patch('/genres', [GenresController::class, 'update']);
$router->delete('/genres/destroy', [GenresController::class, 'destroy']);

$router->get('/members',            [MembersController::class, 'index']);
$router->get('/members/show',       [MembersController::class, 'show']);
$router->get('/members/create',     [MembersController::class, 'create']);
$router->post('/members/store',     [MembersController::class, 'store']);
$router->get('/members/edit',       [MembersController::class, 'edit']);
$router->patch('/members/update',   [MembersController::class, 'update']);
$router->delete('/members/destroy', [MembersController::class, 'destroy']);





return [
    '/'                 => 'Controllers/home.php',
    '/dashboard'        => 'Controllers/dashboard/index.php',

    '/movies'           => 'Controllers/movies/index.php',
    '/movies/show'      => 'Controllers/movies/show.php',
    '/movies/create'    => 'Controllers/movies/create.php',
    '/movies/store'     => 'Controllers/movies/store.php',
    '/movies/edit'      => 'Controllers/movies/edit.php',
    '/movies/update'    => 'Controllers/movies/update.php',
    '/movies/destroy'   => 'Controllers/movies/destroy.php',

    '/formats'          => 'Controllers/formats/index.php',
    '/formats/show'     => 'Controllers/formats/show.php',
    '/formats/create'   => 'Controllers/formats/create.php',
    '/formats/store'    => 'Controllers/formats/store.php',
    '/formats/edit'     => 'Controllers/formats/edit.php',
    '/formats/update'   => 'Controllers/formats/update.php',
    '/formats/destroy'  => 'Controllers/formats/destroy.php',

    '/rentals/destroy'  => 'Controllers/rentals/destroy.php',
];