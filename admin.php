<?php
    require_once 'connection/connection.php';
?>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php require_once 'nav.php'; ?>
    <div class="container">
        <h2 class="text-center" style="margin-top: 20px;">Admin Dashboard</h2> <br>
        <div class="row">
            <div class="col-md-6">
                <h3>User Added Quizes</h3><br>
                <?php
                    $sql = "SELECT * FROM quizpool";
                    $result = mysqli_query($connection,$sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $g = explode(',', $row['options']);
                            echo "<div class='card' style='width: 18rem;'>" . 
                                    "<div class='card-body'>" . 
                                        "<h5 class='card-title'>Quiz By " . $row['userid'] . "</h5>" . 
                                        "<p class='card-text'>" . $row['question'] . "</p>" . 
                                    "</div>" . 
                                    "<ul class='list-group list-group-flush'>"; 
                                        foreach($g as $i){
                                            echo "<li class='list-group-item'>" . $i . "</li>";
                                        }
                                        echo "<li class='list-group-item'>Correct answer: " . $row['correct_option'] . "</li>";
                                    echo "</ul>" .
                                    "<div class='card-body'>" . 
                                        "<a href=\"approve.php?poolid={$row['qpid']}&action=approve\" class='card-link btn btn-dark'>Approve</a>" . 
                                        "<a href=\"approve.php?poolid={$row['qpid']}&action=delete\" class='card-link btn btn-danger'>Delete</a>" . 
                                    "</div>" . 
                                "</div>";
                        }
                    } else {
                        echo "No Quizes Added Yet";
                    }
                ?>
            </div>
            <div class="col-md-6">
                <h3>Questions</h3>
                <a href="addquestion.php" class="btn btn-dark">Add Question</a> <br><br>
                <?php
                    $sql = "SELECT * FROM quizzes";
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
        </div>
    </div>
</body>
</html>