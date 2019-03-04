<?php 
namespace App\Controllers;

use App\Models\PageModel;
use App\Controllers\ParentController;
use App\Helpers\Format;

class Page extends ParentController
{
    //propiedades

    private $page;

    /**
     * Cuando se crea un objeto este controlador
     * tambien se crea un objeto del modelo("Una composicion").
     */
    public function __construct() {
        $this->page = new PageModel();        
    }

    /**
     * Recibe el id del libro deseado
     * para traer las paginas que le corresponden.
     */

    public function read_all($book_id){ 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: text/html');     
        Format::page_printer($this->page->read($book_id));
    }

    /**
     * Recibe el id del libro deseado, el numero de la pagina y el formato deseado
     * para traer la pagina solicitada.
     */

    public function read_one($book_id, $page_number, $format){ 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: text/html');     
        Format::page_printer($this->page->read_single($book_id,$page_number), true, $format);
    }
}

?>