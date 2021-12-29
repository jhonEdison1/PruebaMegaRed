<?php
  $user = $this->d['user'];
  $ordenes = $this->d['ordenes'];
  $total = 0;
  //declarar un json desccompras
  $descCompras = "|";
  
  




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
  
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"><?php echo $user->getNombre() ?></a>  
    <ul class="nav nav-pills">
      <li class="nav-item">
            <a class="nav-link "  href="<?php echo constant('URL') . '/User'; ?>">Perfil</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link  " href="<?php echo constant('URL') . '/Dashboard'; ?>">Productos</a>
        </li>
        
        <li class="nav-item">  
            <a class="nav-link active" href="<?php echo constant('URL') . '/Orden'; ?>">Orden </a>   
        </li>
        <li class="nav-item">
            <a class="nav-link " href="<?php echo constant('URL') . '/Compras'; ?>">Compras</a>
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
            <h1 >Mis Ordenes</h1>
            
        </div>

        <?php if(!$ordenes){
            echo '<div class="alert alert-danger" role="alert">
            No hay ordenes
            </div>';
        } ?>
        
    
        <table class="table">
        <thead class="thead-dark"> 
          <tr>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Fecha</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        
     
        <?php
        //agregar al json descCompra el id del usuario
        if($ordenes)
        {
        $sep = "|";
        

        $ids= "";
        $sepid = "¡";
        $sepordens = "¿";
        $ordens = "";
        foreach ( $ordenes as $item) {
            echo "<tbody>
            <tr>
            <th scope='row'>{$item->getNombre()}</th>
            <td>{$item->getPrecio()}</td>
            <td>{$item->getFecha()}</td>
            <td><button class='btn btn-danger' onclick='location.href=\"".constant('URL')."/Orden/deleteOrden/{$item->getId()}\"'>Eliminar</button></td>
            </tr>
          
            '";
            $ids .= $item->getProductosId() . $sepid; ;
            $ordens .= $item->getId() . $sepordens;
            $total = $total + $item->getPrecio();
            
        }
        
        $descCompra =  $descCompra . $user->getId() .$sep .$ids. $sep .$total .$sep  .$user->getNombre() . $sep . $ordens;
        }
        ?> 
        <tr class="table-primary">
            <td scope="col">Total</td>
            <td scope="col"><?php echo $total ?></td>
            <td scope="col">Enviar a <?php echo $user->getNombre() ?></td>
            <?php if($ordenes){  echo "  <td><button class='btn btn-success' onclick='location.href=\"".constant('URL')."/Compras/addCompra/{$descCompra }\"'>Pagar</button></td>" ;}?>
            
           
          </tr>

        </tbody>
         </table>   
   </div>
    
</body>
</html>