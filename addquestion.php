<?php
    require_once 'connection/connection.php';
?>
<?php
    session_start();

    if(isset($_POST['put'])){
        $quiz = mysqli_real_escape_string($connection, $_POST['quiz']);

        $option1 = $_POST['opt1'];
        $option2 = $_POST['opt2'];
        $option3 = $_POST['opt3'];
        $option4 = $_POST['opt4'];

        $options = $option1 . "," . $option2 . "," . $option3 . "," . $option4;
        
        $correctoption = $_POST['correctoption'];
        $category = $_POST['category'];
        $lang = $_POST['lang'];
        $user = $_SESSION['user_id'];

        $sql = "INSERT INTO quizzes (question,options,correct_option,category,qlang,createdby) VALUES('{$quiz}','{$options}','$correctoption','{$category}','{$lang}',0)";
        $result = $connection->query($sql);

        if($result){
            echo "<script>alert('Quiz added successfully!')</script>";
            header("Location: admin.php");
        }else{
            echo "<script>alert('Failed to add quiz!')</script>";
            header("Location: admin.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Put a Quiz</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        .form-label{
            font-weight: 500;
        }
    </style>
</head>
<body>
    <?php require_once 'nav.php'; ?>

    <div class="container" style="margin-top: 30px;margin-bottom:10px;">
        <h2 class="text-center">Put your quiz into <span class="brandname">ProQuiZ</span></h2>

        <form action="addquestion.php" method="post" class="col-md-11" style="margin-left: 50px;margin-right:50px">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Put your quiz here!</label>
                <input type="text" name="quiz" class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Option 1</label>
                    <input type="text" name="opt1" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Option 2</label>
                    <input type="text" name="opt2" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Option 3</label>
                    <input type="text" name="opt3" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Option 4</label>
                    <input type="text" name="opt4" class="form-control" id="exampleFormControlInput1">
                </div>
            </div>
            
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Correct Answer</label><br>
                &nbsp;&nbsp;<input type="radio" value="1" name="correctoption"> Option 1 &nbsp;&nbsp;
                <input type="radio" value="2" name="correctoption"> Option 2 &nbsp;&nbsp;
                <input type="radio" value="3" name="correctoption"> Option 3 &nbsp;&nbsp;
                <input type="radio" value="4" name="correctoption"> Option 4 &nbsp;&nbsp;
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Quiz Category</label>
                <select class="form-select" aria-label="Default select example" name="category">
                    <option selected>Select a quiz category</option>
                    <option value="oop">Object Oriented Programming</option>
                    <option value="wb">Web Development</option>
                    <option value="dsa">Data Structures and Algorithms</option>
                    <option value="normal">Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Programming Language</label>
                <select class="form-select" aria-label="Default select example" name="lang">
                    <option selected>Select a Programming Language</option>
                    <option value="java">Java</option>
                    <option value="normal">HTML CSS</option>
                    <option value="js">Javascript</option>
                    <option value="python">Python</option>
                    <option value="php">PHP</option>
                    <option value="cpp">C++</option>
                    <option value="c">C</option>
                    <option value="mysql">MySQL</option>
                    <!-- <option value="all">All</option> -->
                </select>
            </div>

            <button type="submit" name="put" class="btn btn-outline-dark me-2">Submit your quiz</button>
        </form>
    </div>
</body>
</html>