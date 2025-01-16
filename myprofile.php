<?php
    require_once 'connection/connection.php';
?>
<?php
    session_start();

    if(!isset($_SESSION['user_id'])){
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once 'nav.php'; ?>
    <div class="container">
        <h2 class="text-center" style="margin-top: 20px;">My Details</h2>
        <?php
            $sql = "SELECT * FROM users WHERE userid='{$_SESSION['user_id']}'";
            $result = mysqli_query($connection,$sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<h3><b>Name</b>: " . $row['fname'] . " " . $row['lname'] . "</h3>";
                    echo "<h3><b>Email</b>: " . $row['mail'] . "</h3>";
                    echo "<h3><b>Overall Marks</b>: " . $row['marks'] . " <a href='leaderboard.php' style='text-decoration:none;'>Leaderboard</a></h3>";
                }
            }
        ?>

        <br><br>
        <?php
            if(isset($_POST['sub'])){
                $mail = mysqli_real_escape_string($connection,$_POST['mail']);
                $pswd = mysqli_real_escape_string($connection,$_POST['pswd']);
                $cpswd = mysqli_real_escape_string($connection,$_POST['cpswd']);

                if($pswd == $cpswd){
                    $hashedPassword = password_hash($pswd,PASSWORD_DEFAULT);
                    $sql = "UPDATE users SET mail='{$mail}',pswd='{$hashedPassword}' WHERE userid='{$_SESSION['user_id']}'";
                    $result = mysqli_query($connection,$sql);

                    if($result){
                        echo "<script>alert('Details Updated Successfully!')</script>";
                        header("Location: myprofile.php");
                    }else{
                        echo "<script>alert('Failed to update details!')</script>";
                    }
                }else{
                    echo "<script>alert('Passwords do not match!')</script>";
                }
            }
        ?>
        <form action="" class="col-md-6" method="post">
            <h3>Update Email and Password</h3>
            <input type="email" class="form-control" name="mail" id="" placeholder="New Email"><br>
            <input type="password" class="form-control" name="pswd" id="" placeholder="New Password"><br>
            <input type="password" class="form-control" name="cpswd" id="" placeholder="Confirm Password"><br>
            <button type="submit" class="btn btn-dark" name="sub">Update</button>
        </form>
    </div>
</body>
</html>