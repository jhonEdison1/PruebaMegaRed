<?php


$user = $this->d['user'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand"><?php echo $user->getNombre() ?></a>  
    <ul class="nav nav-pills">
      <li class="nav-item">
            <a class="nav-link active"  href="<?php echo constant('URL') . '/Admin/profile/'; ?>">Perfil</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link  " href="<?php echo constant('URL') . '/Admin'; ?>">Usuarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo constant('URL') . '/Admin/getBloqueados/'; ?>">Usuarios Bloqueados</a>
        </li>
        <li class="nav-item">  
            <a class="nav-link " href="<?php echo constant('URL') . '/Productos'; ?>" >Agregar Producto</a>   
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Compras</a>
        </li>
    </ul>
  <form class="form-inline" action="<?php echo constant('URL');?>/user/cerrarSession" method="POST">
    <button class="btn btn-warning my-2 my-sm-0" type="submit">cerrar Sesion</button>
  </form>
</nav>

<div class="container p-4">
<div class="text-center">
        <h2>Mi Perfil</h2>
        
    </div>
    
    <div class="text-center">
        <h4>
        nombre: <?php echo $user->getNombre(); ?>
        </h4>
        
    </div>
    <div class="text-center">
        <h4>
        apellido: <?php echo $user->getApellido(); ?>
        </h4>
        
    </div>
    <div class="text-center">
        <h4>
        Email: <?php echo $user->getEmail(); ?>
        </h4>
        
    </div>
    <div class="row">
        <div class="col-lg-3">

        </div>
        <div class="col-lg-6">
        
        <form action="<?php echo constant('URL'). '/user/updatePassword' ?>" method="POST">
        <div class="form-group">
                <label for="password">Cambiar Contraseña</label>
                <input type="password" name="password" id="password" required class="form-control">

        </div>

            
            <div class="form-group">
                <input type="submit" value="Actualizar" class="btn btn-primary btn-block">
            </div>
    
        </form>
        </div>
    </div>

    
</div>
    
</body>
</html>