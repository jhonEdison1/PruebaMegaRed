<?php
    $user = $this->d['user'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Usuario</title>
</head>
<body>
    <h2>
        <?php echo $user->getEmail(); ?>
    </h2>

    <section id="password-user-container">
        <form action="<?php echo constant('URL'). '/user/updatePassword' ?>" method="POST">

            <div class="section">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <input type="submit" value="Actualizar">
            </div>
    
        </form>


    </section>
    
</body>
</html>