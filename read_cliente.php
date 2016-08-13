<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8"); 
 
// include database and object files 
include_once 'config/Database.php'; 
include_once 'objects/Cliente.php'; 
 
//Instancia del Objeto Database para conexion con mysql
$database = new Database(); 
$db = $database->getConnection();
  
// Se crea un objeto Prodicto apra almacenarlo
$product = new Cliente($db);
  
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
            $data .= '"email":"' . $email . '",';
            $data .= '"userName":"' . $userName . '",';
            $data .= '"telephone":"' . $telephone . '",';
            $data .= '"name":"' . $name . '",';
            $data .= '"apPaterno":"' . $apPaterno . '",';
            $data .= '"apMaterno":"' . $apMaterno . '",';
            $data .= '"direccion":"' . $direccion . '",';
            $data .= '"password":"' . $password . '",';
            $data .= '"puntos":"' . $puntos . '"';
        $data .= '}'; 
          
        $data .= $x<$num ? ',' : ''; $x++; 
    } 
    // Se manda la salida en formato JSON
    echo '{"records":[' . $data . ']}'; 
} 
 
?>