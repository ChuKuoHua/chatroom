<?php
    session_start(); //啟動session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <nav>
        <div class="text-center container col-md-3">
        <h1 class="font-weight-bolder">Welcome</h1>
        <section class="bg rounded">               
            <form action="include/login.inc.php" method="post">
                    <div class="form-group col-md-12">                    
                        <input type="text" class="form-control" name="mailuid" placeholder="Username/E-mail..">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="password" class="form-control" name="pwd" placeholder="Password">
                    </div> 
                    <div class="form-group col-md-12" id="bm">
                        <button  class="btn btn-outline-info col-6"  type="submit" name="login">Login</button>
                    </div>   
            </form>
</section>
        </div>
    </nav>
    <hr class="my-4">
    <div class="text-center container col-md-3" id="sig">
        <h1 class="font-weight-bolder">Sign up</h1>
        <section class="si-bg rounded">
            
            <?php
                if(isset($_SESSION['message'])):
            ?>
        <div class="alert alert-<?php echo $_SESSION['msg_type']?>" >

            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>

            <?php endif ?>
            <form  class="form-group nav justify-content-center" action="include/signup.inc.php" method="post">
                <div class="form-group col-md-12">
                    <input class="form-control" type="text" name="uid" placeholder="Username">
                </div>
                <div class="form-group col-md-12">
                    <input class="form-control" type="text" name="mail" placeholder="E-mail">
                </div>
                <div class="form-group col-md-12">
                    <input class="form-control" type="password" name="pwd" placeholder="Password">
                </div>
                <div class="form-group col-md-12">
                    <input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat password">
                </div>
                <div class="form-group col-md-12">
                    <button class="btn btn-warning col-6" type="submit" name="signup">Signup</button>
                </div>
            </form>
        </section>
    </div>
</body>
</html>
