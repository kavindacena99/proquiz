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
        <h2 class="text-center" style="margin-top: 20px;">My Quizes</h2>
        <?php
            $sql = "SELECT * FROM quizzes WHERE userid='{$_SESSION['user_id']}'";
            $result = mysqli_query($connection,$sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<div class='card'>" . 
                            "<div class='card-body'>" . 
                                $row['question'] . 
                            "</div>" . 
                        "</div><br>";
                }
            }
        ?>
    </div>
</body>
</html>