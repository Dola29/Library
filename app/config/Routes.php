<?php

$router = new \Bramus\Router\Router();

// Custom 404 
$router->set404(function() {
	header('HTTP/1.1 404 Not Found');
	echo '404, Ruta no encontrada!';
});

// Ruta estatica, pagina de inicio.
$router->get('/', function() {
	echo '<h1>Bienvenido a la libreria</h1>';
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
//Obtener una pagina de un libro en el formato deseado
$router->get('/book/(\d+)/page/(\d+)', function($book_id, $page_number) {
    $page = new App\Controllers\Page();
    print_r($page->read_one($book_id, $page_number));
});

// Thunderbirds are go!
$router->run();