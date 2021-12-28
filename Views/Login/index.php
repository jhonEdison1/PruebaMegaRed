<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
   
    <p><?php
        $this->showMessages();   
    ?></p>
    
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                </div>
                <div class="col-lg-6">
                    <form action="<?php echo constant('URL');?>/login/authenticate" method="POST">
                        <div class="form-group">
                            <p>
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"  >
                            </p>
                        </div>
                        <div class="form-group">
                            <p>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" autocomplete="off" >
                            </p>
                        </div>
                        <div class="form-group">
                            <p>
                                <input type="submit" class="btn btn-primary" value="Login">
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>

   
           
    


    
</body>
</html>