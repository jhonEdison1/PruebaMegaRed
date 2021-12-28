<?php
  $user = $this->d['user'];
  $producto = $this->d['producto'];




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center p-4">
       <div class="card">
        <div class="card-header">
        <h1>
            <?php echo $producto->getNombre(); ?>
        </h1>
        </div>  
        <div class="card-body">            
            <div class="col-lg-12">
                <p>
                    <?php echo $producto->getDescripcion(); ?>
                </p>
                <p>
                    <?php echo $producto->getPrecioBase(); ?>
                </p>
                <p>
                    <?php echo $producto->getStock(); ?>
                </p>
                <div class="text-center">
                    <a href="<?php echo constant('URL') . '/Dashboard'; ?>" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div> 
       </div>     
    </div>
    
</body>
</html>