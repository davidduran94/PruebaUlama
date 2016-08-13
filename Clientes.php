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

	<div class="" ng-app="myApp" ng-controller="clientesCtrl">
    <div class="row">
        <div class="col s12">
            <h4>Lista de Clientes</h4>
			<!-- used for searching the current list -->
			<input type="text" ng-model="search" class="form-control" placeholder="Search game..." />
			 
			<!-- table that shows product record list -->
			<table class="hoverable bordered">
			 
			    <thead>
			        <tr>
			            <th class="width-5-pct">ID</th>
			            <th class="width-20-pct">Email</th>
			            <th class="width-20-pct">User Name</th>
			            <th class="width-20-pct">Telefono</th>
			            <th class="width-30-pct">Nombre(s)</th>
			            <th class="width-30-pct">Apellido Paterno</th>
			            <th class="width-50-pct">Apellido Materno</th>
			            <th class="width-30-pct">Direccion</th>
			            <th class="width-15-pct">Password</th>
			            <th class="width-15-pct">Puntos</th>
			        </tr>
			    </thead>
			 
			    <tbody ng-init="getAll()">
			        <tr ng-repeat="d in names | filter:search">
			        	<p>{{d}}</p>
			            <td>{{ d.id }}</td>
			            <td>{{ d.email }}</td>
			            <td>{{ d.userName }}</td>
			            <td>{{ d.telephone }}</td>
			            <td>{{ d.name }}</td>
			            <td>{{ d.apPaterno }}</td>
			            <td>{{ d.apMaterno }}</td>
			            <td>{{ d.direccion }}</td>
			            <td>{{ d.password }}</td>
			            <td>{{ d.puntos }}</td>
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
				                <input ng-model="email" type="email" class="validate" id="form-email" placeholder="Type name here..." required/>
				                <label data-error="error" data-success="bien" for="email">Email</label>
				            </div>

				            <div class="input-field col s12">
				                <input ng-model="username" type="text" class="validate" id="form-username" placeholder="Type name here..." required/>
				                <label for="username" data-error="error" data-success="bien" >Username</label>
				            </div>
				 			

				 			<div class="input-field col s12">
				                <input ng-model="telephone" type="number" class="validate" id="form-telephone" placeholder="number of 10 digits" required />
				                <label data-error="error" data-success="bien" for="form-telephone">Telefono</label>
				            </div>

				            <div class="input-field col s12">
				                <input ng-model="name" type="text" class="validate" id="form-name" placeholder="Type name here..." />
				                <label for="name" data-error="error" data-success="bien">Nombre</label>
				            </div>

				            <div class="input-field col s12">
				                <input ng-model="apPaterno" id="form-apPaterno" type="text" class="validate materialize-textarea" placeholder="Apellido Paterno..." required>
				                <label for="apPaterno" data-error="error" data-success="bien">Apellido Paterno</label>
				            </div>
				 
				 			<div class="input-field col s12">
				                <input ng-model="apMaterno" type="text" class="validate" id="form-apMaterno" placeholder="Type name here..." required/>
				                <label for="apMaterno" data-error="error" data-success="bien" >Apellido Materno</label>
				            </div>

				            <div class="input-field col s12">
				                <input ng-model="direccion" type="text" class="validate" id="form-direccion" placeholder="Type adress here..." required/>
				                <label for="direccion" data-error="error" data-success="bien" >Direccion</label>
				            </div>
							
							<div class="input-field col s12">
				                <input ng-model="cp" type="number" class="validate" id="form-cp" placeholder="Debe contener 5 numeros" required/>
				                <label for="cp" data-error="error" data-success="bien">CP</label>
				            </div>

				            <div class="input-field col s12">
				                <input ng-model="password" type="password" class="validate" id="form-password" placeholder="Debe contener al menos 7 caracteres" required/>
				                <label for="password" data-error="error" data-success="bien" >Contraseña</label>
				            </div>

				            <div class="input-field col s12">
				                <input ng-model="puntos" type="number" class="validate" id="form-puntos" placeholder="Puntos iniciales" required/>
				                <label for="puntos" data-error="error" data-success="bien" >132</label>
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
	<script type="text/javascript" src="js/src/controladorClientes.js"></script>
</body>
</html>