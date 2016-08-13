<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8"); 
 
// include database and object files 
include_once 'config/Database.php'; 
include_once 'objects/Videojuego.php'; 
 
//Instancia del Objeto Database para conexion con mysql
$database = new Database(); 
$db = $database->getConnection();
  
// Se crea un objeto Prodicto apra almacenarlo
$product = new Videojuego($db);
  
//El metodo lee todo los prodictos en la BD
$stmt = $product->readAll();
$num = $stmt->rowCount();
  
//Si son mas de 0 registros
if($num>0)
{
      
    $data="";
    $x=1;
      
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
          
        $data .= '{';
            $data .= '"id":"'  . $id . '",';
            $data .= '"titulo":"' . $titulo . '",';
            $data .= '"desarrollador":"' . $desarrollador . '",';
            $data .= '"year":"' . $year . '",';
            $data .= '"consolas":"' . $consolas . '",';
            $data .= '"clasificacion":"' . $clasificacion . '",';
            $data .= '"descripcion":"' . html_entity_decode($descripcion) . '",';
            $data .= '"genero":"' . $genero . '",';
            $data .= '"precio":"' . $precio . '",';
            $data .= '"existencias":"' . $existencias . '"';
        $data .= '}'; 
          
        $data .= $x<$num ? ',' : ''; $x++; 
    } 
    // Se manda la salida en formato JSON
    echo '{"records":[' . $data . ']}'; 
} 
 
?>