<?php
    require_once 'connection/connection.php';
?>
<?php
    session_start();

    if(isset($_SESSION['user_id'])){
        header("Location: index.php");
    }
?>
<?php
    if(isset($_POST['signup'])){
        $mail = mysqli_real_escape_string($connection,$_POST['mail']);
        $fname = mysqli_real_escape_string($connection,$_POST['fname']);
        $lname = mysqli_real_escape_string($connection,$_POST['lname']);

        if($_POST['pswd'] == $_POST['cpswd']){
            $pswd = password_hash($_POST['pswd'],PASSWORD_DEFAULT);
            $sql1 = "INSERT INTO users (fname,lname,mail,pswd) VALUES('{$fname}','{$lname}','{$mail}','{$pswd}')";
            $result = mysqli_query($connection,$sql1);

            if(isset($result)){
                header("Location: login.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Sign Up</title>
    <style>
        form{
            margin-top: 160px;
            margin-left: 40px;
            width: 75%;
        }
        .montserrat-brand{
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-weight: 900;
            font-style: normal;
            font-size: 50px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-center montserrat-brand" style="margin-top: 150px;font-size:80px">ProQuiZ</h1>
                <br>
                <p class="text-center" style="font-size:large;">Practice Code and Go Up</p><br><br>
                <p class="text-center">Have an account? <a style="text-decoration: none;color:grey" href="login.php">Login</a></p>
            </div>
            <div class="col-md-6">
                <form action="signup.php" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputFullname1" class="form-label">First Name</label>
                        <input type="text" name="fname" id="exampleInputFullname1" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputFullname1" class="form-label">Last Name</label>
                        <input type="text" name="lname" id="exampleInputFullname1" class="form-control">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="pswd" class="form-control" id="examplePassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                      <input type="password" class="form-control" name="cpswd" id="exampleConfirmPassword1">
                    </div>
                    <button name="signup" type="submit" class="btn btn-dark">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>