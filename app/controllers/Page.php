<?php 
namespace App\Controllers;

use App\Models\PageModel;
use App\Controllers\ParentController;

class Page extends ParentController
{
    private $page;

    public function __construct() {
        $this->page = new PageModel();        
    }

    public function read_all($book_id){ 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');     
        print(json_encode($this->page->read()));
    }

    public function read_one($book_id, $page_number){ 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');     
        print(json_encode($this->page->read_single($id,$page_number)));

    }
}

?>