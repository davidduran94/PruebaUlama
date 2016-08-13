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
      <a href="http://www.ulamalabs.co" class="brand-logo center">Prueba UlamaLabs.co</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="VideoJuegos.php">Videojuegos</a></li>
        <li><a href="Clientes.php">Clientes</a></li>
        <li><a href="Compras.php">Ventas</a></li>
      </ul>
    </div>
  </nav>

	<div class="" ng-app="myApp" ng-controller="videojuegosCtr">
    <div class="row">
        <div class="col s12">
            <h4>Videojuegos</h4>
			<!-- used for searching the current list -->
			<input type="text" ng-model="search" class="form-control" placeholder="Search game..." />
			 
			<!-- table that shows product record list -->
			<table class="hoverable bordered">
			 
			    <thead>
			        <tr>
			            <th class="width-5-pct">ID</th>
			            <th class="width-30-pct">Titulo</th>
			            <th class="width-30-pct">Desarrollador</th>
			            <th class="width-30-pct">Año</th>
			            <th class="width-30-pct">Consolas</th>
			            <th class="width-30-pct">Clasificacion</th>
			            <th class="width-50-pct">Descripción</th>
			            <th class="width-30-pct">Genero</th>
			            <th class="width-15-pct">Precio</th>
			            <th class="width-15-pct">Existencias</th>
			        </tr>
			    </thead>
			 
			    <tbody ng-init="getAll()">
			        <tr ng-repeat="d in names | filter:search">
			        	<p>{{d}}</p>
			            <td>{{ d.id }}</td>
			            <td>{{ d.titulo }}</td>
			            <td>{{ d.desarrollador }}</td>
			            <td>{{ d.year }}</td>
			            <td>{{ d.consolas }}</td>
			            <td>{{ d.clasificacion }}</td>
			            <td>{{ d.descripcion }}</td>
			            <td>{{ d.genero }}</td>
			            <td>{{ d.precio }}</td>
			            <td>{{ d.existencias }}</td>
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
				        <h4 id="modal-product-title">Insertar datos</h4>
				        <div class="row">
				            <div class="input-field col s12">
				                <input ng-model="name" type="text" class="validate" id="form-name" placeholder="Type name here..." />
				                <label for="name">Titulo</label>
				            </div>

				            <div class="input-field col s12">
				                <input ng-model="name" type="text" class="validate" id="form-name" placeholder="Type name here..." />
				                <label for="name">Desarrollador</label>
				            </div>
				 			

				 			<div class="input-field col s12">
				                <input ng-model="name" type="text" class="validate" id="form-name" placeholder="Type name here..." />
				                <label for="name">Fecha</label>
				            </div>

				            <div class="input-field col s12">
				                <input ng-model="name" type="text" class="validate" id="form-name" placeholder="Type name here..." />
				                <label for="name">Consolas</label>
				            </div>

				            <div class="input-field col s12">
				                <textarea ng-model="description" type="text" class="validate materialize-textarea" placeholder="Type description here..."></textarea>
				                <label for="description">Descripcion</label>
				            </div>
				 
				 			<div class="input-field col s12">
				                <input ng-model="name" type="text" class="validate" id="form-name" placeholder="Type name here..." />
				                <label for="name">Clasificación</label>
				            </div>

				            <div class="input-field col s12">
				                <input ng-model="name" type="text" class="validate" id="form-name" placeholder="Type name here..." />
				                <label for="name">Genero</label>
				            </div>

				            <div class="input-field col s12">
				                <input ng-model="price" type="text" class="validate" id="form-price" placeholder="Type price here..." />
				                <label for="price">Precio</label>
				            </div>

				            <div class="input-field col s12">
				                <input ng-model="name" type="text" class="validate" id="form-name" placeholder="Type name here..." />
				                <label for="name">Existencias</label>
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
	<script type="text/javascript" src="js/src/controladorVideojuegos.js"></script>
</body>
</html>