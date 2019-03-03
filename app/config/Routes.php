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
    $books = new App\Controllers\Book();
    print_r($books->read_all());
});

//Obtener un libro del sistema
$router->get('/book/(\d+)', function($id = null) {
    $books = new App\Controllers\Book();
	print_r($books->read_one($id));
	//print $id;
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