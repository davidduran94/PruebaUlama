app.controller ('comprasCtrl', function ($scope, $http){
    $scope.showCreateForm = function(){
        // clear form
        $scope.clearForm();
         
        // change modal title
        $('#modal-product-title').text("Añadir Compra");
         
        // hide update product button
        $('#btn-update-product').hide();
         
        // show create product button
        $('#btn-create-product').show(); 
    }

    // clear variable / form values
    $scope.clearForm = function(){
        $scope.idCliente = "";
        $scope.subtotal = "";
        $scope.total = "";
        $scope.IVA = "";
        $scope.juegos = "";
    }

    // create new product 
    $scope.createProduct = function(){
        var data =  {
                    'idCliente' : $scope.idCliente+'', 
                    'subtotal'  : $scope.subtotal+'', 
                    'total'     : $scope.total+'',
                    'IVA'       : $scope.IVA+'',
                    'juegos'    : $scope.juegos+''
                    }; 
        alert(JSON.stringify(data));
        $http.post('create_venta.php', data)
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

    // Lee todos las compras de la BD
    $scope.getAll = function(){
        $http.get("read_compras.php")
            .success(function(response){
                $scope.names = response.records;
            })
            .error(function(data, status) {
                console.error('Repos error', status, data);
            });
    }

});