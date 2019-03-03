<?php 
namespace App\Controllers;

use App\Models\BookModel;
use App\Controllers\ParentController;

class Book extends ParentController
{
    private $book;

    public function __construct($method = null) {

        $this->book = new BookModel();

        /*if($method != null){
            if($method == 'read_all'){
                $this->read_all();
            }
            
        }else{
            echo 'Mensaje por defecto';
        }*/
        
    }

    public function read_all(){ 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');     
        print(json_encode($this->book->read()));

    }

    public function read_one($id){ 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');     
        print(json_encode($this->book->read_single($id)));

    }
}

?>