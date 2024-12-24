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
    <title>Take a test</title>
    <style>
        .form-label{
            font-weight: 500;
        }
    </style>
</head>
<body>
    <?php require_once 'nav.php'; ?>
    <div class="container">
        <h2 class="text-center" style="margin-top:15px">Select your choices</h2>
        <form action="quizes.php" method="GET">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Created by</label>
                <select class="form-select" aria-label="Default select example" name="created">
                    <option selected>Select a quiz category</option>
                    <option value="add">Created by users</option>
                    <option value="sys">By ProQuiZ</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Quiz Category</label>
                <select class="form-select" aria-label="Default select example" name="category">
                    <option selected>Select a quiz category</option>
                    <option value="oop">Object Oriented Programming</option>
                    <option value="wb">Web Development</option>
                    <option value="dsa">Data Structures and Algorithms</option>
                    <option value="normal">Any</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Programming Language</label>
                <select class="form-select" aria-label="Default select example" name="lang">
                    <option selected>Select a Programming Language</option>
                    <option value="java">Java</option>
                    <option value="js">Javascript</option>
                    <option value="python">Python</option>
                    <option value="php">PHP</option>
                    <option value="cpp">C++</option>
                    <option value="mysql">MySQL</option>
                    <option value="normal">Any Language</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Number of Quizes</label>
                <input type="number" name="noofquizes" id="name" class="form-control" placeholder="Number of quizes">
            </div><br>
            <button type="submit" class="btn btn-outline-dark me-2">Take the test</button>
        </form>
    </div>
</body>
</html>