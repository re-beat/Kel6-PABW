<?php
    require_once('./conn.php');
    if($login->isLogin()){
        $hak_akses = $_SESSION['hak_akses'];
        if($hak_akses=='admin'){
            header('Location:./admin/');
        }else if($hak_akses=='mahasiswa'){
            header('Location:./mahasiswa');
        }else{
            header('Location:./dosen');
        }
    }
    if(isset($_POST['login'])){
        $username = $_POST['username']; 
        $password = $_POST['password']; 
        // Proses login user 
        $login->try_login($username, $password);
    } 
?>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/custom.css">
        <link rel="stylesheet" href="./assets/fontawesome/css/all.css">
        <title>Login</title>
    </head>
    <body>
        <div class="login-background">
            <div class="row w-100 h-100 justify-content-center align-items-center">
                <div class="col-md-4 login">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-12">
                            <h2 class="text-bold">Login</h2>
                        </div>
                    </div>
                    <?php
                        if(isset($error)){
                            echo '<div class="alert alert-warning">'.$error.'</div>';
                        }
                    ?>
                    <form method="post">
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-8">
                                <input type="text" name="username" placeholder="Masukkan username" class="form-control" require>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-8">
                                <input type="password" name="password" placeholder="Masukkan password" class="form-control" require>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>