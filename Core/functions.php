<?php

function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}

function base_path($path): string
{
    return dirname(__DIR__) . DIRECTORY_SEPARATOR . $path;
}

function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/errors/404.php");
    die;
}

function redirect($path)
{
    header("location:/$path");
    exit();
}

function goBack(): void
{
    header("location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

//TODO: move to a Helper calss next 3 functions
function isCurrent(string $link): bool
{
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

    if($uri === $link){
        return true;
    }
    
    $route = explode('/', $uri)[1];

    return $route === $link;
}

function setActiveCalss(string $link): string
{
    return isCurrent($link) ? 'active' : '';
}

function setAriaCurent(string $link): string
{
    return isCurrent($link) ? 'aria-curent="page"' : 'aria-curent="false"';
}