<?php 
/****************************************************

Desarrollado por: David Durán Rodríguez
México CDMX, 12-Agosto-2016

Clase Videojuego cntiene los campos mapeados de la base de datos 
y define los metodos de crear y leer a la BD

************************************************************/


class Videojuego{ 
    // database connection and table name 
    private $conn; 
    private $table_name = "juego"; 
 
    // object properties 
    public $id;
    public $titulo;
	public $desarrollador;
	public $year;
	public $consolas = array();
	public $clasificacion;
	public $descripcion;
	public $genero;
	public $precio;
	public $existencias;	
 
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
        $query = "SELECT * FROM Videojuegos.juego;";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
         
        // execute query
        $stmt->execute();
         
        return $stmt;
    }
}
?>