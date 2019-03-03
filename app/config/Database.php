<?php 

namespace App\Config;

class Database {
  // DB Parametros
  private $host = 'localhost';
  private $db_name = 'library';
  private $username = 'root';
  private $password = '';

  private $conn;

  // DB conectar
  public function connect() {
    $this->conn = null;

    try{
      $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->username,$this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }catch(PDOException $e){
      echo 'Error de conexion:' . $e->getMessage();
    }
    return $this->conn;
  }

  
}
?>