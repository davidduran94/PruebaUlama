<?php 
/****************************************************

Desarrollado por: David Durán Rodríguez
México CDMX, 12-Agosto-2016

Clase Cliente cntiene los campos mapeados de la base de datos 
y define los metodos de crear y leer a la BD

************************************************************/

class Cliente{ 
    // database connection and table name 
    private $conn; 
    private $table_name = "cliente"; 
 
    // object properties 
    public  $id;
    private $email;
	private $userName;
	private $telephone;
	private $name;
	private $apPaterno;
	private $apMaterno;
	private $direccion;
	private $password;
	private $puntos;	
 
    // constructor with $db as database connection 
    public function __construct($db){ 
        $this->conn = $db;
    }

    // create product
    function create(){
         
        // query to insert record
        $query = "INSERT INTO 
                    " . $this->table_name . "
                SET 
                    titulo=:titulo, desarrollador:desarrollador, year:year,
                    consolas:consolas, clasificacion:clasificacion, descripcion=:descripcion,
                    genero:genero, precio:precio, existencias:existencias";
         
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // Se quitan caracteres especiales para evitar SQL injections
        $this->titulo=htmlspecialchars(strip_tags($this->titulo)); 
        $this->precio=htmlspecialchars(strip_tags($this->precio));
        $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
     
        // bind values
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":year", $this->year);
         
        // execute query
        if($stmt->execute()){
            return true;
        }else{
            echo "<pre>";
                print_r($stmt->errorInfo());
            echo "</pre>";
     
            return false;
        }
    }

    // read products
    function readAll(){
     
        // select all query
        $query = "SELECT * FROM Videojuegos.cliente;";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
         
        // execute query
        $stmt->execute();
         
        return $stmt;
    }
}
?>