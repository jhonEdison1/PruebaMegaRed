<?php

$compras = $this->d['compras'];
$user = $this->d['user'];
$total = 0;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Compras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand">Admin</a>  
    <ul class="nav nav-pills">
    <li class="nav-item">
            <a class="nav-link"  href="<?php echo constant('URL') . '/Admin/profile/'; ?>">Perfil</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link  " href="<?php echo constant('URL') . '/Admin'; ?>">Usuarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="<?php echo constant('URL') . '/Admin/getBloqueados/'; ?>">Usuarios Bloqueados</a>
        </li>
        <li class="nav-item">  
            <a class="nav-link" href="<?php echo constant('URL') . '/Productos'; ?>" >Agregar Producto</a>   
        </li>
        <li class="nav-item">
            <a class="nav-link active"href="<?php echo constant('URL') . '/Admin/getAllCompras/'; ?>">Compras</a>
        </li>
        <li class="nav-item">
            <a class="nav-link "href="<?php echo constant('URL') . '/Admin/getAllOrders/'; ?>">Ordenes</a>
        </li>
    </ul>
  <form class="form-inline" action="<?php echo constant('URL');?>/user/cerrarSession" method="POST">
    <button class="btn btn-warning my-2 my-sm-0" type="submit">cerrar Sesion</button>
  </form>
</nav>
<div class="container">
        <p>
            <?php
                 
                $this->showMessages(); 
            ?>
        </p>
        <div class="text-center p-2">
            <h1 >Total Compras</h1>
            
        </div>

        <?php if(!$compras){
            echo '<div class="alert alert-danger" role="alert">
            No hay compras
            </div>';
        } ?>
        
    
        <table class="table">
        <thead class="thead-dark"> 
          <tr>
            <th scope="col">Ticket</th>
            <th scope="col">Precio</th>
            <th scope="col">Usuario</th>
            <th scope="col">Fecha</th>
            
          </tr>
        </thead>
        
     
        <?php
        //agregar al json descCompra el id del usuario
        if($compras)
        {
        
        foreach ( $compras as $item) {
            echo "<tbody>
            <tr>
            <th scope='row'>{$item->getId()}</th>
            <td>{$item->getPrecio()}</td>
            <td>{$item->getNombreUsuario()}</td> 
            <td>{$item->getFecha()}</td>           
            </tr>
          
            '";
            $total = $total + $item->getPrecio();
           
            
        }
        
       
        }
        ?> 
        <tr class="table-primary">
            <td scope="col">Total</td>
            <td scope="col"><?php echo $total ?></td>
           
           
            
           
          </tr>

        </tbody>
         </table>   
   </div>
    
</body>
</html>