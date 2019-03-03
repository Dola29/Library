<?php 
namespace App\Models;

use App\Config\Database;

class ParentModel {

    public $conn;
    public $table;
    
    public function __construct($table) {
        $db = new Database();
        $this->conn = $db->connect();
        $this->table= $table;
    }


    /* recibe un string con los campos a seleccionar
       y retorna todos los registros de la tabla 
    */
    public function get_all($fields) {
        // Crear query
        $query = "SELECT  {$fields} FROM {$this->table}";
        
        //Preparar statement
        $stmt = $this->conn->prepare($query);

        // Ejecutar query
        $stmt->execute();
        
        //se convierte la data en un arreglo
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //retorna la data
        return $data;
    }
    
    /* recibe un string con los campos a seleccionar y el id del registro
    y retorna un registro de la tabla 
    */
    public function get_single($fields, $id) {
        // Crear query
        $query = 'SELECT '.$fields.'FROM '.
                $this->table .'WHERE id = ?';

        // Preparar statement
        $stmt = $this->conn->prepare($query);

        // Enlazar ID
        $stmt->bindParam(1, $id);

        // Ejecutar query
        $stmt->execute();

        //se convierte el registro en un arreglo
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // llenar propiedades
        return $row;         
    }
      

}

?>