<?php
    require_once 'connection/connection.php';
?>
<?php
    if(isset($_POST['login'])){
        $mail = mysqli_real_escape_string($connection,$_POST['mail']);
        $pswd = mysqli_real_escape_string($connection,$_POST['pswd']);

        /*

        if (isset($_POST['login'])) {
    $mail = mysqli_real_escape_string($connection, $_POST['mail']);
    $pswd = mysqli_real_escape_string($connection, $_POST['pswd']);

    if ($mail != "" && $pswd != "") {
        // Fetch the user's hashed password from the database
        $sql1 = "SELECT * FROM users WHERE mail='{$mail}'";
        $result_set1 = mysqli_query($connection, $sql1);

        if ($result_set1 && mysqli_num_rows($result_set1) == 1) {
            $row = mysqli_fetch_assoc($result_set1);
            $hashedPassword = $row['pswd']; // Assuming 'pswd' stores the hashed password
            
            // Verify the entered password with the hashed password
            if (password_verify($pswd, $hashedPassword)) {
                $usertype = $row['usertype']; // Assuming 'usertype' exists in the table

                if ($usertype == 'admin') {
                    // Redirect admin to the dashboard
                    header("Location: dashboard.php");
                } else {
                    // Set session for regular user
                    $_SESSION['user_id'] = $row['userid'];
                    $_SESSION['fname'] = $row['fname'];
                    header("Location: index.php");
                }
                exit(); // Stop further execution after redirect
            } else {
                echo "<div class='alert alert-danger' role='alert'>Invalid Email or Password</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Invalid Email or Password</div>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>Please fill in all fields</div>";
    }
}

        */

        if($mail != "" && $pswd != ""){
            $sql1 = "SELECT * FROM users WHERE mail='{$mail}' AND pswd='{$pswd}'";
            $result_set1 = mysqli_query($connection,$sql1);

            /*
            if(isset($result_set1)){
                echo "<div class='alert alert-danger' role='alert'>" . 
                            "Invalid Email or Password" . "</div>";
            }
            */

            if(mysqli_num_rows($result_set1) == 1){
                $row = mysqli_fetch_assoc($result_set1);
                //$usertype = $row['usertype'];
                $usertype = "";

                if($usertype == 'admin'){
                    //$_SESSION['user_id'] = $row['userid'];
                    header("Location: dashboard.php");
                }else{
                    $_SESSION['user_id'] = $row['userid'];
                    $_SESSION['fname'] = $row['fname'];
                    header("Location: index.php");
                }
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
    <title>Login</title>
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
                <p class="text-center">Don't have an account? <a style="text-decoration: none;color:grey" href="signup.php">Create an account</a></p>
            </div>
            <div class="col-md-6">
                <form action="login.php" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" name="pswd" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button name="login" type="submit" class="btn btn-dark">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>