app.controller ('videojuegosCtr', function ($scope, $http){
    $scope.showCreateForm = function(){
        // clear form
        $scope.clearForm();
         
        // change modal title
        $('#modal-product-title').text("Añadir Videojuego");
         
        // hide update product button
        $('#btn-update-product').hide();
         
        // show create product button
        $('#btn-create-product').show(); 
    }

    // clear variable / form values
    $scope.clearForm = function(){
        $scope.titulo        = "";
        $scope.desarrollador = "";
        $scope.consolas      = "";
        $scope.descripcion   = "";
        $scope.clasificacion = "";
        $scope.genero        = "";
        $scope.precio        = "";
        $scope.existencias   = "";
    }

    // create new product 
    $scope.createProduct = function(){
        var data = {
                'titulo'        : $scope.titulo, 
                'desarrollador' : $scope.desarrollador, 
                'consolas'      : $scope.consolas,
                'descripcion'   : $scope.descripcion,
                'clasificacion' : $scope.clasificacion,
                'genero'        : $scope.genero,
                'precio'        : $scope.precio+'',
                'existencias'   : $scope.existencias+''
            };
        //alert(JSON.stringify(data));
        // fields in key-value pairs
        $http.post('create_game.php', data)
            .success(function (data, status, headers, config) {
                console.log(data);
                // tell the user new product was created
                Materialize.toast(data, 4000);
                 
                // close modal
                $('#modal-product-form').closeModal();
                 
                // clear modal content
                $scope.clearForm();
                 
                // refresh the list
                $scope.getAll();
        });
    }

    // read products
    $scope.getAll = function(){
        $http.get("read_juegos.php")
            .success(function(response){
                $scope.names = response.records;
            })
            .error(function(data, status) {
                console.error('Repos error', status, data);
            });
    }

});