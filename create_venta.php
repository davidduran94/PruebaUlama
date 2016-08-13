<?php 
/****************************************************

Desarrollado por: David Durán Rodríguez
México CDMX, 12-Agosto-2016

Obtiene los datos necesarios para guardar en lal BD 
un objeto Compra

************************************************************/


include_once 'config/Database.php'; 
$database = new Database(); 
$db = $database->getConnection();
 
// instanciar el objeto Compra
include_once 'objects/Compra.php';
$product = new Compra($db);
 
// obtener la informacion recibida desde el cliente
$data = json_decode(file_get_contents("php://input")); 
 
// colocar los datos dentro del objeto Compra
//$product->fecha 		= date('Y-m-d H:i:s');
$product->idCliente 	= $data->idCliente;
$product->subtotal 		= $data->subtotal;
$product->total 		= $data->total;
$product->IVA 			= $data->IVA;
$product->juegos 		= $data->juegos;


if($product->create()){
    echo "Compra was created.";
}
 
// if unable to create the product, tell the user
else{
    echo "Unable to create Compra.";
}
?>
