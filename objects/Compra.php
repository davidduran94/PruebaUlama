<?php 
/****************************************************

Desarrollado por: David Durán Rodríguez
México CDMX, 12-Agosto-2016

Clase Compra cntiene los campos mapeados de la base de datos 
y define los metodos de crear y leer a la BD

************************************************************/

class Compra{ 
    // database connection and table name 
    public $conn; 
    public $table_name = "compra"; 
 
    // object properties 
    public  $id;
    public $fecha;
	public $idCliente;
	public $subtotal;
	public $total;
	public $IVA;
	public $juegos;	
 
    // constructor with $db as database connection 
    public function __construct($db){ 
        $this->conn = $db;
    }

    // create Compra
    function create(){
         
        // query to insert record
        $query = "INSERT INTO 
                    " . $this->table_name . "
                SET 
                    idCliente=:idCliente, subtotal=:subtotal,
                    total=:total, IVA=:IVA, juegos=:juegos";
         
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // Se quitan caracteres especiales para evitar SQL injections
        //$this->fecha     = htmlspecialchars(strip_tags($this->fecha)); 
        $this->idCliente = htmlspecialchars(strip_tags($this->idCliente));
        $this->subtotal  = htmlspecialchars(strip_tags($this->subtotal));
        $this->total     = htmlspecialchars(strip_tags($this->total));
        $this->IVA       = htmlspecialchars(strip_tags($this->IVA));
        $this->juegos    = htmlspecialchars(strip_tags($this->juegos));
     
        // bind values
        //$stmt->bindParam(":fecha",      $this->fecha);
        $stmt->bindParam(":idCliente",  $this->idCliente);
        $stmt->bindParam(":subtotal",   $this->subtotal);
        $stmt->bindParam(":total",      $this->total);
        $stmt->bindParam(":IVA",        $this->IVA);
        $stmt->bindParam(":juegos",     $this->juegos);
         
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
        $query = "SELECT * FROM Videojuegos.compra;";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
         
        // execute query
        $stmt->execute();
         
        return $stmt;
    }
}
?>