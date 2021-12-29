<?php
  $user = $this->d['user'];
  $session = $this->d['session'];
  




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
            <a class="nav-link active" href="<?php echo constant('URL') . '/Carrito'; ?>">Carrito </a>   
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Compras</a>
        </li>
    </ul>
  <form class="form-inline" action="<?php echo constant('URL');?>/user/cerrarSession" method="POST">
    <button class="btn btn-warning my-2 my-sm-0" type="submit">cerrar Sesion</button>
  </form>
</nav>
    
</body>
</html>