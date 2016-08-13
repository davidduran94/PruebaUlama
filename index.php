<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ulama Prueba</title>

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
      <a href="http://www.ulama.co" class="brand-logo center">Prueba Ulama.co</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="VideoJuegos.php">Videojuegos</a></li>
        <li><a href="Clientes.php">Clientes</a></li>
        <li><a href="Compras.php">Ventas</a></li>
      </ul>
    </div>
  </nav>
	<br><br>
	<div class="container" ng-app="myApp" ng-controller="productsCtrl">
    	<div class="collection">
		    <a href="VideoJuegos.php" class="collection-item">Videojuegos<span class="badge">1</span></a>
		    <a href="Clientes.php" class="collection-item">Clientes<span class="new badge">4</span></a>
		    <a href="Compras.php" class="collection-item">Ventas<span class="badge">14</span></a>
		</div>

	</div> <!-- end container -->
	<script type="text/javascript" src="js/src/app.js"></script>
	<script type="text/javascript" src="js/src/controladorProductos.js"></script>
</body>
</html>