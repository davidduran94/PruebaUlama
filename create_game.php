<?php 
/****************************************************

Desarrollado por: David Durán Rodríguez
México CDMX, 12-Agosto-2016

Obtiene los datos necesarios para guardar en lal BD 
un objeto Videojuego

************************************************************/


include_once 'config/Database.php'; 
$database = new Database(); 
$db = $database->getConnection();
 
// instanciar el objeto videoJuego
include_once 'objects/Videojuego.php';
$product = new Videojuego($db);
 
// obtener la informacion recibida desde el cliente
$data = json_decode(file_get_contents("php://input")); 
 
// set product property values
$product->titulo 		= $data->titulo;
$product->desarrollador = $data->desarrollador;
$product->year 			= date('Y-m-d H:i:s');
$product->consolas 		= $data->consolas;
$product->clasificacion = $data->clasificacion;
$product->descripcion 	= $data->descripcion;
$product->genero 		= $data->genero;
$product->precio 		= $data->precio;
$product->existencias 	= $data->existencias;

     
// create the product
if($product->create()){
    echo "VideoGame was created.";
}
 
// if unable to create the product, tell the user
else{
    echo "Unable to create VideoGame.";
}
?>
