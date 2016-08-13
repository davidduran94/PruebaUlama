<?php 
/****************************************************

Desarrollado por: David Durán Rodríguez
México CDMX, 12-Agosto-2016

Obtiene los datos necesarios para guardar en lal BD 
un objeto Cliente

************************************************************/


include_once 'config/Database.php'; 
$database = new Database(); 
$db = $database->getConnection();
 
// instanciar el LA CLASE CLIENTE
include_once 'objects/Cliente.php';
$product = new Cliente($db);
 
// obtener la informacion recibida desde el cliente
$data = json_decode(file_get_contents("php://input")); 
 
// set product property values
$product->email 		= $data->email;
$product->userName 		= $data->userName;
$product->telephone 	= $data->telephone;
$product->name 			= $data->name;
$product->apPaterno 	= $data->apPaterno;
$product->apMaterno 	= $data->apMaterno;
$product->direccion 	= $data->direccion;
$product->password 		= $data->password;
$product->puntos 		= $data->puntos;

     
// create the product
if($product->create()){
    echo "Client was created.";
}
 
// if unable to create the product, tell the user
else{
    echo "Unable to create Client.";
}
?>
