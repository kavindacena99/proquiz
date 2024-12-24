<?php
    require_once 'connection/connection.php';
?>
<?php
    $lang = $_GET['language'];
    $category = $_GET['category'];
    $noOfQuizes = $_GET['noofquizes'];
    $created = $_GET['created'];

    if($category == "normal"){
        $sql = "SELECT * FROM quizzes WHERE qlang = '{$lang}' LIMIT $noOfQuizes";
    }elseif($lang == "normal"){
        $sql = "SELECT * FROM quizzes WHERE category = '{$category}' LIMIT $noOfQuizes";
    }elseif($lang == "normal" && $category == "normal"){
        $sql = "SELECT * FROM quizzes LIMIT $noOfQuizes";
    }else{
        $sql = "SELECT * FROM quizzes WHERE category = '{$category}' AND qlang = '{$lang}' LIMIT $noOfQuizes";
    }

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