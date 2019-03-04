<?php

$router = new \Bramus\Router\Router();

// Custom 404 
$router->set404(function() {
	header('HTTP/1.1 404 Not Found');
	echo '404, route not found!';
});

// Ruta estatica, pagina de inicio.
$router->get('/', function() {
	echo '<h1>bramus/router</h1><p>Try these routes:<p><ul><li>/hello/<em>name</em></li><li>/blog</li><li>/blog/<em>year</em></li><li>/blog/<em>year</em>/<em>month</em></li><li>/blog/<em>year</em>/<em>month</em>/<em>day</em></li></ul>';
});

/**
 *  Rutas Dinamicas
*  */

//Obtener todos los libros del sistema
$router->get('/books/', function() {
    $book = new App\Controllers\Book();
    print_r($book->read_all());
});

//Obtener un libro del sistema
$router->get('/book/(\d+)', function($id = null) {
    $book = new App\Controllers\Book();
	print_r($book->read_one($id));
});

//Obtener todas las paginas de un libro del sistema
$router->get('/book/(\d+)/pages', function($book_id) {
    $page = new App\Controllers\Page();
    print_r($page->read_all($book_id));
});

//Dynamic route with (successive) optional subpatterns: /blog(/year(/month(/day(/slug))))
$router->get('/blog(/\d{4}(/\d{2}(/\d{2}(/[a-z0-9_-]+)?)?)?)?', function($year = null, $month = null, $day = null, $slug = null) {
	if (!$year) { echo 'Blog overview'; return; }
	if (!$month) { echo 'Blog year overview (' . $year . ')'; return; }
	if (!$day) { echo 'Blog month overview (' . $year . '-' . $month . ')'; return; }
	if (!$slug) { echo 'Blog day overview (' . $year . '-' . $month . '-' . $day . ')'; return; }
	echo 'Blogpost ' . htmlentities($slug) . ' detail (' . $year . '-' . $month . '-' . $day . ')';
});

// Thunderbirds are go!
$router->run();