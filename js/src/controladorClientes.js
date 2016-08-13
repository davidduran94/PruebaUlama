app.controller ('clientesCtrl', function ($scope, $http){
    $scope.showCreateForm = function(){
        // clear form
        $scope.clearForm();
         
        // change modal title
        $('#modal-product-title').text("Añadir cliente");
         
        // hide update product button
        $('#btn-update-product').hide();
         
        // show create product button
        $('#btn-create-product').show(); 
    }

    // clear variable / form values
    $scope.clearForm = function(){
        $scope.email     = "";
        $scope.username  = "";
        $scope.telephone = "";
        $scope.name      = "";
        $scope.apPaterno = "";
        $scope.apMaterno = "";
        $scope.direccion = "";
        $scope.password  = "";
        $scope.puntos    = "";
    }

    // create new product 
    $scope.createProduct = function(){
         var data =  {
            'email'     : $scope.email, 
            'userName'  : $scope.username, 
            'telephone' : $scope.telephone+'',
            'name'      : $scope.name,
            'apPaterno' : $scope.apPaterno,
            'apMaterno' : $scope.apMaterno,
            'direccion' : $scope.direccion,
            'password'  : $scope.password,
            'puntos'    : $scope.puntos+''
        };
        alert(JSON.stringify(data));
        // fields in key-value pairs
        $http.post('create_cliente.php', data)
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
        $http.get("read_cliente.php")
            .success(function(response){
                $scope.names = response.records;
            })
            .error(function(data, status) {
                console.error('Repos error', status, data);
            });
    }

});