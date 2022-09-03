<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vizzerr Registration Page</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/bootstrap.min.css" type="text/css" rel="stylesheet">
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
            header("location: main.php");
            exit;
        }

        if(isset($_POST['register'])){
            $first = $_POST['first'];
            $last = $_POST['last'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $conpassword = $_POST['confirm_password'];
            if($connect){
                if($password != $conpassword){
                    echo "<p style='background: red; color: white'>Error: Password does not match. Try again</p>";
                }else{
                    $hashpass = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT into usersdata values ('', '$first', '$last', '$username', '$email', '$hashpass', '1')";
                    mysqli_query($connect, $sql);
                    header('Location: login.php');
                }
            }
        }
    ?>
    <div class="container-fluid ">
        <center>
            <div class="shadow p-5 w-25 mb-5 bg-body rounded" style="margin-top:5vh">
                <img class="mt-3" src="./assets/glasses_icon.svg" alt="logo icon" width="100"/>
                <h4 class="mb-5" style="color: #1D94BE">Vizzerr Registration</h4>
                <div class="text-end">
                    <a href="login.php" style="text-decoration: none"><span class="glyphicon glyphicon-arrow-left"></span>Return to Login Page</a>
                </div>
                <form method="POST" action="registration.php">
                    <input class="form-control" type="text" name="first" id="first" placeholder="First Name" required/><br>
                    <input class="form-control" type="text" name="last" id="last" placeholder="Last Name" required/><br>  
                    <input class="form-control" type="email" name="email" id="email" placeholder="Email" required/><br>
                    <input class="form-control" type="text" name="username" id="username" placeholder="Username" required/><br>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password" required/><br>
                    <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required/><br>
                    <button class="btn btn-success mb-3" type="submit" name="register" id="submit">Register</button>
                </form>
            </div>
            <footer class="mt-5" style="border-top:1px solid lightgrey">
                <p style="margin-bottom:-5px"><small><em>Developed by: G-Man Quillosa</em></small></p>
                <p style="margin-bottom:-5px"><small><em>Powered by: MJSantillan Optical Clinic&copy</em></small></p>
            </footer>
        </center>
    </div>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>