<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ulama Prueba David</title>

	<!-- Materioalize CSS-->
	<link rel="stylesheet" href="css/materialize.min.css">
	
	<!--Fonts de Google-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- include jquery -->
	<script type="text/javascript" src="js/libs/jquery-3.1.0.min.js"></script>
	 
	<!-- material design js -->
	<script src="js/libs/materialize.min.js"></script>
	 
	<!-- include angular js -->
	<script src="js/libs/angular.min.js"></script>

	<style>
			.width-30-pct{
			    width:30%;
			}
			 
			.text-align-center{
			    text-align:center;
			}
			 
			.margin-bottom-1em{
			    margin-bottom:1em;
			}
	</style>
</head>
<body>
	<script>
		// create new product 
		$(document).ready(function(){
		    // initialize modal
		    $('.modal-trigger').leanModal();
		});		         
	</script>

	<nav>
    <div class="nav-wrapper">
      <a href="http://www.ulama.co" class="brand-logo center">Prueba UlamaLabs.co</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="VideoJuegos.php">Videojuegos</a></li>
        <li><a href="Clientes.php">Clientes</a></li>
        <li><a href="Compras.php">Compras</a></li>
      </ul>
    </div>
  </nav>

	<div class="" ng-app="myApp" ng-controller="comprasCtrl">
    <div class="row">
        <div class="col s12">
            <h4>Historial de Ventas</h4>
			<!-- used for searching the current list -->
			<input type="text" ng-model="search" class="form-control" placeholder="Search game..." />
			 
			<!-- table that shows product record list -->
			<table class="hoverable bordered">
			 
			    <thead>
			        <tr>
			            <th class="width-15-pct">ID Compra</th>
			            <th class="width-15-pct">Fecha</th>
			            <th class="width-15-pct">Cliente ID</th>
			            <th class="width-15-pct">Subtotal</th>
			            <th class="width-10-pct">Total</th>
			            <th class="width-10-pct">IVA</th>
			            <th class="width-15-pct">Id's de juegos adquiridos</th>
			        </tr>
			    </thead>
			 
			    <tbody ng-init="getAll()">
			        <tr ng-repeat="d in names | filter:search">
			            <td>{{ d.id }}</td>
			            <td>{{ d.fecha }}</td>
			            <td>{{ d.idCliente }}</td>
			            <td>{{ d.subtotal }}</td>
			            <td>{{ d.total }}</td>
			            <td>{{ d.IVA }}</td>
			            <td>{{ d.juegos }}</td>
			            <td>
			                <a ng-click="readOne(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">edit</i>Edit</a>
			                <a ng-click="deleteProduct(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">delete</i>Delete</a>
			            </td>
			        </tr>
			    </tbody>
			</table>
            
             <!-- modal for for creating new product -->
				<div id="modal-product-form" class="modal">
				    <div class="modal-content">
				        <h4 id="modal-product-title">Insertar datos de Venta</h4>
				        <div class="row">

				            <div class="input-field col s12">
				                <input ng-model="idCliente" type="number" class="validate" id="form-idCliente" placeholder="Debe ser un numero" />
				                <label data-error="error" data-success="bien" for="idCliente">No. de Cliente</label>
				            </div>

				            <div class="input-field col s12">
				                <input ng-model="subtotal" type="number" class="validate" id="form-subtotal" placeholder="Debe ser un numero" />
				                <label data-error="error" data-success="bien" for="subtotal">Subtotal</label>
				            </div>

				 			<div class="input-field col s12">
				                <input ng-model="total" type="number" class="validate" id="form-total" placeholder="Debe ser un numero" />
				                <label data-error="error" data-success="bien" for="total">Total</label>
				            </div>

							<div class="input-field col s12">
				                <input ng-model="IVA" type="number" class="validate" id="form-IVA" placeholder="Debe ser un numero" />
				                <label data-error="error" data-success="bien" for="IVA">IVA</label>
				            </div>

				            <div class="input-field col s12">
				                <input ng-model="juegos" id="form-juegos" type="text" class="validate" placeholder="Teclee id's de juegos vendidos"/>
				                <label data-error="error" data-success="bien" for="juegos">Juegos</label>
				            </div>
				 
				 
				            <div class="input-field col s12">
				                <a id="btn-create-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createProduct()"><i class="material-icons left">add</i>Create</a>
				 
				                <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
				            </div>
				        </div>
				    </div>
				</div>
				<!-- floating button for creating product -->
				<div class="fixed-action-btn" style="bottom:45px; right:24px;">
				    <a class="waves-effect waves-light btn modal-trigger btn-floating btn-large red" href="#modal-product-form" ng-click="showCreateForm()"><i class="large material-icons">add</i></a>
				</div>
        </div> <!-- end col s12 -->
    </div> <!-- end row -->
	</div> <!-- end container -->
	<script type="text/javascript" src="js/src/app.js"></script>
	<script type="text/javascript" src="js/src/controladorCompras.js"></script>
</body>
</html>