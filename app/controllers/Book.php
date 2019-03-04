<?php 
namespace App\Controllers;

use App\Models\BookModel;
use App\Controllers\ParentController;
use App\Helpers\Format;

class Book extends ParentController
{
    private $book;

    public function __construct() {
        $this->book = new BookModel();        
    }

    public function read_all(){ 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: text/html');     
        Format::book_printer($this->book->read(), false);
    }

    public function read_one($id){ 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: text/html');     
        Format::book_printer($this->book->read_single($id), true);
    }
}

?>