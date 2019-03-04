<?php 
namespace App\Models;

use App\ModelsParentModel;

class BookModel extends ParentModel {

  public function __construct() {
    parent::__construct('books');
  }

  // Obtener todos los libros
  public function read() {
    $campos = "id,title,category,author,`date`";    
    $data = parent::get_all($campos, null, null);
    return $data;
  }

  // Obtener un libro
  public function read_single($id) {
    $campos = "id,title,category,author,`date`"; 
    $data = parent::get_single($campos, null, null,$id);            
    return $data;  
  }

}
?>  