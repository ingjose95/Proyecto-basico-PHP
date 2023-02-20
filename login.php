<?php
session_start();

if($_POST) {


    if(($_POST['user'] == 'josemelendez') && ($_POST['password'] == '300995')) {
        
        $_SESSION['user']='josemelendez';


    header('location:index.php'); 


    }else{

        echo '<script>alert("Usuario y contraseña incorrecta");</script>';
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>

            <br />

            <div class="col-md-4">

                <div class="card mt-5">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">

                        <form action="login.php" method="post">

                            <div class="mb-3">
                                <label for="user" class="form-label">User</label>
                                <input type="text" class="form-control" id="user" name="user">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>

                    </div>
                </div>





            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
<?php include 'footer.php'?>
</body>

</html>