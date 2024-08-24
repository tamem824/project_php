<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [

    '/pro/' => 'controllers/index.php',
    'pro/about' => 'controllers/about.php',
    '/pro/notes' => 'controllers/notes.php',
    '/pro/note' => 'controllers/note.php',
    '/pro/contact' => 'controllers/contact.php',
];

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

routeToController($uri, $routes);