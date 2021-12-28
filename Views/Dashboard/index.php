<?php
  $user = $this->d['user'];
  $productos = $this->d['productos'];




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <?php $this->showMessages();?>
    
    <div class="container p-4">
        <div class="container">
        <h1 style="text-align: center">
            Productos        
        </h1>
        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo constant('URL') . '/Productos'; ?>" class="btn btn-primary">Agregar Producto</a>
            </div>
        </div>
            
        <div class="row p-4">
       
             <?php 
               foreach ($productos as $producto ) {
                   //print_r($producto);
                echo (
                    "<div class= 'col-lg-4 p-2'>
                        <div class='card'>
                            <div class='card-header'>
                                <h5 class='card-title text-center' >{$producto->getNombre()}</h5>                                                       
                            </div>
                            <div class='card-body'>
                                <p class='card-text'>Descripcion:{$producto->getDescripcion()}</p>
                                <p class='card-text'>Precio: {$producto->getPrecioBase()}</p>
                                <p class='card-text'>Stock: {$producto->getId()}</p>
                                <div class='text-center'>
                                    <button class='btn btn-primary' onclick='location.href=\"".constant('URL')."/Dashboard/showProducto/{$producto->getId()}\"'>Ver</button>
                                    <button class='btn btn-danger' onclick='location.href=\"".constant('URL')."/Dashboard/eliminarProducto/{$producto->getId()}\"'>Eliminar</button>
                                    
                                  
                                </div>
                            </div>

                        </div>
                    </div>
                    "

                    );
                } 
                 
        
            ?>
                
        

        </div>
    </div>
    <div>
       
       
    </div>
    
</body>
</html>