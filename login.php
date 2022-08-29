<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vizzerr Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
        session_start();
        include('connectDB.php');

        if(isset($_GET["flag"])){
            $_SESSION = array();
            session_destroy();
            unset($_SESSION);
        }

        if(isset($_SESSION["firstname"])){
            header("location: mainpage.php");
            exit;
        }

        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            if($connect){
                $sql = "SELECT * from usersdata where username = '$username'";
                $result = mysqli_query($connect, $sql);
                if(mysqli_num_rows($result) > 0){
                    $res = mysqli_fetch_assoc($result);
                    if(password_verify($password, $res['passwords'])){
                        $_SESSION['uname'] = $res['username'];
                        $_SESSION['first'] = $res['fname'];
                        $_SESSION['last'] = $res['lname'];
                        $_SESSION['email'] = $res['email'];

                        header('Location: mainpage.php');
                        exit;
                    }else{
                        header('Location: login.php');
                        echo "<p style='color: white; background: red'>Login Failed. Wrong Credentials.</p>";
                        exit;
                    }
                }
            }
        }
    ?>
    <div class="container-fluid">
        <center>
            <div class="shadow p-5 w-25 mb-5 bg-body rounded" style="margin-top:15vh">
                <img class="mt-3" src="./assets/glasses_icon.svg" alt="logo icon" width="100"/>
                <h4 class="mb-5" style="color: #1D94BE">Vizzerr Login</h4>
                <form method="POST" action="login.php">
                    <input class="form-control" type="text" name="username" id="username" placeholder="Username" /><br>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password" /><br>
                    <div class="text-end mb-3" style="margin-top:-20px">
                        <a href="registration.php" style="text-decoration: none">Register/Sign-up</a><br>
                    </div>
                    <button class="btn btn-primary mb-3" type="submit" name="login" id="submit">Login</button>
                </form>
            </div>
            <footer class="mt-5" style="border-top:1px solid lightgrey">
                <p style="margin-bottom:-5px"><small><em>Developed by: G-Man Quillosa</em></small></p>
                <p style="margin-bottom:-5px"><small><em>Powered by: MJSantillan Optical Clinic&copy</em></small></p>
            </footer>
        </center>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>