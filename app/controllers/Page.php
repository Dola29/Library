<?php 
namespace App\Controllers;

use App\Models\PageModel;
use App\Controllers\ParentController;
use App\Helpers\Format;

class Page extends ParentController
{
    private $page;

    public function __construct() {
        $this->page = new PageModel();        
    }

    public function read_all($book_id){ 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');     
        Format::page_printer($this->page->read($book_id));
    }

    public function read_one($book_id, $page_number){ 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');     
        Format::page_printer($this->page->read_single($book_id,$page_number));

    }
}

?>