<?php
    require_once 'connection/connection.php';
?>
<?php
    $id = $_GET['poolid'];
    $action = $_GET['action'];

    if($action == "approve"){
        $sql = "SELECT * FROM quizpool WHERE qpid = $id";
        $result = mysqli_query($connection,$sql);
        $row = $result->fetch_assoc();
        
        $sql1 = "INSERT INTO quizzes (question, options, correct_option, category, qlang, createdby) VALUES ('{$row['question']}', '{$row['options']}', '{$row['correct_option']}', '{$row['category']}', '{$row['qlang']}', 1)";
        $result1 = mysqli_query($connection,$sql1);

        if(isset($result1)){
            $sql2 = "DELETE FROM quizpool WHERE qpid = $id";
            $result2 = mysqli_query($connection,$sql2);
            if(isset($result2)){
                header('Location: admin.php');
            }
        }
    }else{
        $sql2 = "DELETE FROM quizpool WHERE qpid = $id";
        $result2 = mysqli_query($connection,$sql2);
        if(isset($result2)){
            header('Location: admin.php');
        }
    }
?>