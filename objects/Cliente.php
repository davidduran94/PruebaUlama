<?php 
/****************************************************

Desarrollado por: David Durán Rodríguez
México CDMX, 12-Agosto-2016

Clase Cliente cntiene los campos mapeados de la base de datos 
y define los metodos de crear y leer a la BD

************************************************************/

class Cliente{ 
    // database connection and table name 
    public $conn; 
    public $table_name = "cliente"; 
 
    // object properties 
    public  $id;
    public $email;
	public $userName;
	public $telephone;
	public $name;
	public $apPaterno;
	public $apMaterno;
	public $direccion;
	public $password;
	public $puntos;	
 
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
                    email=:email, userName=:userName, telephone=:telephone,
                    name=:name, apPaterno=:apPaterno, apMaterno=:apMaterno,
                    direccion=:direccion, password=:password, puntos=:puntos";
         
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // Se quitan caracteres especiales para evitar SQL injections
        $this->email		= htmlspecialchars(strip_tags($this->email)); 
        $this->userName 	= htmlspecialchars(strip_tags($this->userName));
        $this->telephone	= htmlspecialchars(strip_tags($this->telephone));
        $this->name			= htmlspecialchars(strip_tags($this->name));
        $this->apPaterno	= htmlspecialchars(strip_tags($this->apPaterno));
        $this->apMaterno	= htmlspecialchars(strip_tags($this->apMaterno));
        $this->direccion	= htmlspecialchars(strip_tags($this->direccion));
        $this->password		= htmlspecialchars(strip_tags($this->password));
        $this->puntos		= htmlspecialchars(strip_tags($this->puntos));
     
        // bind values
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":telephone", $this->telephone);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":apPaterno", $this->apPaterno);
        $stmt->bindParam(":apMaterno", $this->apMaterno);
        $stmt->bindParam(":direccion", $this->direccion);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":puntos", $this->puntos);
         
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