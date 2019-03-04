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
    public function get_all($fields, $join = null, $filter) {
        //validar que el filtro no este nulo
        if($filter == null){
            $filter = 'WHERE id';
        }
        
        // Crear query
        $query = "SELECT  {$fields} FROM {$this->table} {$join} {$filter}";
        
        //Preparar statement
        $stmt = $this->conn->prepare($query);

        // Ejecutar query
        $stmt->execute();
        
        //se convierte la data en un arreglo
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        //retorna la data
        return $data;
    }
    
    /* recibe un string con los campos a seleccionar y el id del registro
       y retorna un registro de la tabla 
    */
    public function get_single($fields, $join = null, $filter, $id) {
        //validar que el filtro no este nulo
        if($filter == null){
            $filter = 'WHERE id';
        }
        
        // Crear query
        $query = "SELECT {$fields} FROM {$this->table} {$join} {$filter} = {$id}";

        // Preparar statement
        $stmt = $this->conn->prepare($query);
        
        // Ejecutar query
        $stmt->execute();

        //se convierte el registro en un arreglo
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        // llenar propiedades
        return $row;         
    }
      

}

?>