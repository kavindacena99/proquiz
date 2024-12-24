<?php
    require_once 'connection/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        .brandname{
            font-family: "Montserrat", sans-serif;
            font-weight: bolder;
        }
        .navborder{
            border-bottom: 1px solid black;
        }

        #login{
            color: white;
            background-color: black;
        }
        #login:hover{
            border: 1px solid black;
            color: black;
            background-color: white;
            font-weight: 800;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!--nav-->
        <nav class="navbar navbar-expand-lg bg-body-tertiary navborder">
        <div class="container-fluid">
            <a class="navbar-brand brandname" style="font-size: 28px;" href="index.php">ProQuiZ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <form class="d-flex" role="search">
                <h4 class="me-2" style="margin-top: 5px;"><a style="text-decoration: none;color:darkgray;font-weight:200" href="quizes.php">Leaderboard</a></h4>
                <a class="btn btn-outline-dark me-2" href="putquiz.php">Put a Quiz</a>
                <?php
                if(isset($_SESSION['user_id'])){
                    echo "<a class='btn' id='login' href='logout.php'>Logout</a>";
                }else{
                    echo "<a class='btn' id='login' href='login.php'>Login</a>";
                }
                ?>
            </form>
            </div>
        </div>
        </nav>
  </div>
  <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>
</html>