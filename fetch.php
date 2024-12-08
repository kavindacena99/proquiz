<?php
    require_once 'connection/connection.php';
?>
<?php
    $sql = "SELECT * FROM quizzes";
    $result = mysqli_query($connection,$sql);

    $questions = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $questions[] = [
                'id' => $row['qid'],
                'question' => $row['question'],
                'options' => explode(',', $row['options']),
                'correct_option' => $row['correct_option'],
            ];
        }
    }

    // get data with json
    header('Content-Type: application/json');
    echo json_encode($questions);
?>