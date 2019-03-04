<?php 
namespace App\Models;

use App\ModelsParentModel;

class PageModel extends ParentModel {

  public function __construct() {
    parent::__construct('pages as p');
  }

  // Obtener todas las paginas
  public function read($book_id) {
    $campos = "p.id, p.number, p.content, p.book_id, b.title as book";
    $join = "join books as b on p.book_id = b.id";    
    $data = parent::get_all($campos, $join);
    return $data;
  }

  // Obtener la pagina de un libro
  public function read_single($book_id, $page_number) {
    $campos = "p.id, p.number, p.content, p.book_id, b.title as book";
    $join = "join books as b on p.book_id = {$book_id}";
    $data = parent::get_single($campos, null, $page_no, 'p.number');            
    return $data;  
  }

}
?>  