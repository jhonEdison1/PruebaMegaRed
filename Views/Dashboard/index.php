<?php
  $user = $this->d['user'];
  $productos = $this->d['productos'];
  $items = $this->d['items'];




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
    <?php var_dump($items);?>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"><?php echo $user->getNombre() ?></a>  
    <ul class="nav nav-pills">
      <li class="nav-item">
            <a class="nav-link "  href="<?php echo constant('URL') . '/User'; ?>">Perfil</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link active " href="<?php echo constant('URL') . '/Dashboard'; ?>">Productos</a>
        </li>
        
        <li class="nav-item">  
            <a class="nav-link " href="<?php echo constant('URL') . '/Carrito'; ?>">Carrito </a>   
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Compras</a>
        </li>
    </ul>
  <form class="form-inline" action="<?php echo constant('URL');?>/user/cerrarSession" method="POST">
    <button class="btn btn-warning my-2 my-sm-0" type="submit">cerrar Sesion</button>
  </form>
</nav>
    <?php $this->showMessages();?>
    
    <div class="container p-4">
        <div class="container">
        <h1 style="text-align: center">
            Productos        
        </h1>
        
            
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
                                    <button class='btn btn-success' onclick='location.href=\"".constant('URL')."/Carrito/addToCart/{$producto->getId()}\"'>Agregar al Carrito</button>
                                    
                                  
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