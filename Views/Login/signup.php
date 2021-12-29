<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand">Admin</a>  
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link" href="#">Perfil</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link  " href="<?php echo constant('URL') . '/Admin'; ?>">Usuarios</a>
        </li>
       
        
        <li class="nav-item">
            <a class="nav-link" href="<?php echo constant('URL') . '/Admin/getBloqueados/'; ?>">Usuarios Bloqueados</a>
        </li>
        <li class="nav-item">  
            <a class="nav-link" href="<?php echo constant('URL') . '/Productos'; ?>" >Agregar Producto</a>   
        </li>
        
        <li class="nav-item">
            <a class="nav-link"href="<?php echo constant('URL') . '/Admin/getAllCompras/'; ?>">Compras</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"href="<?php echo constant('URL') . '/Admin/getAllOrders/'; ?>">Ordenes</a>
        </li>
    </ul>
  <form class="form-inline" action="<?php echo constant('URL');?>/user/cerrarSession" method="POST">
    <button class="btn btn-warning my-2 my-sm-0" type="submit">cerrar Sesion</button>
  </form>
</nav>

   

    <div class="container p-4">
        <?php
            $this->showMessages();
        ?>
         <div class="text-center">
            <a href="<?php echo constant('URL') . '/Admin'; ?>" class="btn btn-info">Volver</a>
        </div>

        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <h1>Registro</h1>
                </div>
                
              
                <form action="<?php echo constant('URL');  ?>/signup/newUser" method="POST"> 

                    
                    <div class="form-group">
                    <p>
                        <label for="nombre" >nombre</label>
                        <input type="nombre" name="nombre" id="nombre"  class="form-control">

                    </p>

                    </div>
                    <div class="form-group">
                    <p>
                        <label for="apellido">apellido</label>
                        <input type="apellido" name="apellido" id="apellido" class="form-control">

                    </p>
                    </div>
                    <div class="form-group">
                    <p>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">

                    </p>
                    </div>
                    <div class="form-group">
                    <p>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password"  class="form-control">
                    </p>
                    </div>
                    <div class="form-group">
                    <p>
                        <input type="submit" value="Registrar" class="btn btn-primary btn-block">
                    </p>
                    </div>
                </form>             
                
            </div>
            <div class="col-lg-3">
                    
            </div>
        </div>
    </div>



    
    
    
</body>
</html>