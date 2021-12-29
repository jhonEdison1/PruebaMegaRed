<?php

$users = $this->d['users'];
$user = $this->d['user'];


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administracion</title>
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
            <a class="nav-link active " href="<?php echo constant('URL') . '/Admin'; ?>">Usuarios</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo constant('URL') . '/Admin/getBloqueados/'; ?>">Usuarios Bloqueados</a>
        </li>
        <li class="nav-item">  
            <a class="nav-link" href="<?php echo constant('URL') . '/Productos'; ?>" >Agregar Producto</a>   
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
        <div class="text-center p-2">
            <h1 >Panel Administracion</h1>
            <h2>Usuarios</h2>
        </div>
        <div class="text-center">
            <a href="<?php echo constant('URL') . '/signup'; ?>" class="btn btn-info">Agregar Usuario</a>
        </div>
    
        <table class="table">
        <thead class="thead-dark"> 
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Email</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        
     
        <?php
        
        foreach ( $users as $item) {
            echo "<tbody>
            <tr>
            <th scope='row'>{$item->getNombre()}</th>
            <td>{$item->getApellido()}</td>
            <td>{$item->getEmail()}</td>
            <td><button class='btn btn-danger' onclick='location.href=\"".constant('URL')."/Admin/bloquearUsuario/{$item->getId()}\"'>Bloquear</button></td>
            </tr>
          
            </tbody>'";
            
            
        }
        ?> 
         </table>   
   </div>
    


    
</body>
</html>