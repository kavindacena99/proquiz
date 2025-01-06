<?php
    require_once 'connection/connection.php';
?>
<?php
    session_start();

    $sql = "SELECT * FROM quizzes WHERE createdby='{$_SESSION['user_id']}'";
    $result = mysqli_query($connection,$sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $g = explode(',', $row['options']);
            echo "<div class='card' style='width: 18rem;'>" . 
                    "<div class='card-body'>" . 
                        "<h5 class='card-title'>Quiz By " . $row['createdby'] . "</h5>" .
                        "<p class='card-text'>" . $row['question'] . "</p>" .
                    "</div>" .      
                    "<ul class='list-group
                    list-group-flush'>"; 
                        foreach($g as $i){
                            echo "<li class='list-group-item'>" . $i . "</li>";
                        }
                        echo "<li class='list-group-item'>Correct answer: " . $row['correct_option'] . "</li>";}}
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
        
    </div>
</body>
</html>