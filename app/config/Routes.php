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
    echo '<h3>Puedes acceder estas URLS, con diferentes libros y paginas:</h6>';
    echo '<ul>'.'<li>books/ --> para ver el listado de libros</li>'.
                '<li>book/1 --> para ver un libro (solo hay 3 en el sistema)</li>'.
                '<li>book/pages/ --> todas las paginas de un libro (Cada libro tiene 5paginas)</li>'.
                '<li>book/1/page/1/(text o html)--> la pagina del libro 1 en el formato desado</li>'
         .'</ul>';
});

/**
 *  Rutas Dinamicas
*  */

//Obtener todos los libros del sistema
$router->get('/books/', function() {
    $book = new App\Controllers\Book();
    $book->read_all();
});

//Obtener un libro del sistema
$router->get('/book/(\d+)', function($id = null) {
    $book = new App\Controllers\Book();
	$book->read_one($id);
});

//Obtener todas las paginas de un libro del sistema
$router->get('/book/(\d+)/pages', function($book_id) {
    $page = new App\Controllers\Page();
    print_r($page->read_all($book_id));
});
//Obtener una pagina de un libro en el formato deseado
$router->get('/book/(\d+)/page/(\d+)/(\w+)', function($book_id, $page_number, $format) {
    $page = new App\Controllers\Page();
    print_r($page->read_one($book_id, $page_number, $format));
});

// Thunderbirds are go!
$router->run();