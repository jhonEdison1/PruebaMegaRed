<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>

    <?php
        $this->showMessages();
    ?>

    <div class="container">

        <div class="row">
            <div class="col-lg-8">
                <h1>Registro</h1>
                <!---- cambiarlo tal vez  por bootstrap agregar otros campos como apellido, nombre--  cambiar la redirecion ---->
                <form action="<?php echo constant('URL');  ?>/signup/newUser" method="POST"> 

                    <h2>Registra un Empleado</h2>
                    <p>
                        <label for="nombre">nombre</label>
                        <input type="nombre" name="nombre" id="nombre">

                    </p>
                    <p>
                        <label for="apellido">apellido</label>
                        <input type="apellido" name="apellido" id="apellido">

                    </p>
                    <p>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">

                    </p>
                    <p>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </p>
                    <p>
                        <input type="submit" value="Registrar">
                    </p>



                </form>




                
                
            </div>
        </div>
    </div>



    
    
    
</body>
</html>