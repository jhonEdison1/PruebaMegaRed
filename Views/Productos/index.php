<?php
  $user = $this->d['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Productos</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"><?php echo $user->getNombre() ?></a>  
    <ul class="nav nav-pills">
      <li class="nav-item">
            <a class="nav-link"  href="<?php echo constant('URL') . '/Admin/profile/'; ?>">Perfil</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link  " href="<?php echo constant('URL') . '/Admin'; ?>">Usuarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo constant('URL') . '/Admin/getBloqueados/'; ?>">Usuarios Bloqueados</a>
        </li>
        <li class="nav-item">  
            <a class="nav-link active" href="<?php echo constant('URL') . '/Productos'; ?>" >Agregar Producto</a>   
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Compras</a>
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
        <div class="text-center">
            <a href="<?php echo constant('URL') . '/Admin'; ?>" class="btn btn-info">Volver</a>
        </div>
        <div class="text-center">
            <h1 >Panel Administracion</h1>
            <h2>Agrega Un Producto</h2>
        </div>
       
        
        <div class="row">
            <div class="col-lg-3">
             
            </div>
            <div class="col-lg-6 pt-4">
            <form action="<?php echo constant('URL');?>/productos/newProducto" method="POST">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" name ="nombre" id="nombre" aria-describedby="nombre">
                  
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="precio">Precio Base</label>
                  <input type="number" class="form-control" id="precioBase" name="precioBase" step="0.10" min="0.10" >
                </div>
                <div class="form-group">
                  <label for="impuesto">impuesto </label>
                  <input type="number" class="form-control" id="impuesto" name="impuesto" step="0.1" min="0.10" max="1" >
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select class="form-control" id="estado" name="estado">
                      <option value="1">Activo</option>
                      <option value="0">Agotado</option>                      
                    </select>
                </div>
                <div class="form-group">
                  <label for="stock">Stock </label>
                  <input type="number" class="form-control" id="stock" name="stock" step="1" min="1" max="100" >
                </div>

               
                <button type="submit" class="btn btn-primary btn-block">Agregar Producto</button>
              </form>
            </div>
            <div class="col-lg-3">
              
              
            </div>
        </div>
    </div>
    
    
</body>
</html>