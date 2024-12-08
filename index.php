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
  <title>ProQuiZ</title>
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
    .card {
      border: none;
      transition: transform 0.3s, box-shadow 0.3s;
    } 
    .card:hover {
      transform: scale(1.02);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
            <a class="btn btn-outline-dark me-2" href="">Put a Quiz</a>
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

  <div class="container">
    <h1 class="text-center" style="margin-top: 18px;margin-bottom:80px;">Hi <?php if(isset($_SESSION['user_id'])){echo" " . $_SESSION['fname'];} ?>, Welcome to <span class="brandname">ProQuiZ</span></h1>

    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="card p-3">
            <h4 class="card-title" style="font-weight: 500;">Take Quizzes</h4>
            <p class="card-text">Challenge yourself with AI-generated quizzes, user-contributed quizzes, or curated quizzes to test and improve your programming knowledge.</p>
            <a href="#" class="btn btn-dark">Take the Quiz</a>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card p-3">
            <h4 class="card-title" style="font-weight: 500;">Contribute Quizzes</h4>
            <p class="card-text">Share your knowledge with the ProQuiZ community by contributing quizzes on programming concepts and languages.</p>
            <a href="#" class="btn btn-dark">Put a Quiz</a>
        </div>
      </div>
    </div>

    <h1 style="margin-top: 12px;margin-bottom:50px;">Quiz Categories</h1>

    <div class="row">
      <div class="col-md-6">
        <div class="card">
            <img src="images/sys.jpg" width="400px" height="200px"  class="card-img-top quiz-category-img" alt="Default Quizzes">
            <div class="card-body">
              <h5 class="card-title">Default Quizzes</h5>
              <p class="card-text">Explore expertly designed quizzes for various programming topics and languages.</p>
              <a href="#" class="btn btn-dark">Take a Test</a>
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <img src="images/use.jpg" width="400px" height="200px"  class="card-img-top quiz-category-img" alt="User-Contributed Quizzes">
          <div class="card-body">
              <h5 class="card-title">User-Contributed Quizzes</h5>
              <p class="card-text">Test your skills with quizzes contributed by other users in the ProQuiZ community.</p>
              <a href="#" class="btn btn-dark">Take a Test</a>
          </div>
        </div>
      </div>
    </div>

    <h1 style="margin-top: 50px;margin-bottom:50px;">Learning Resources</h1>
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="images/w3.png" class="img-fluid rounded-start" alt="W3Schools">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">W3Schools</h5>
                        <p class="card-text">Access a vast array of programming tutorials and examples.</p>
                        <a href="https://www.w3schools.com/" class="btn btn-outline-dark btn-sm">Explore</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
          <div class="card mb-3">
              <div class="row g-0">
                  <div class="col-md-4">
                      <img src="images/d.png" class="img-fluid rounded-start" alt="YouTube">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title">YouTube</h5>
                          <p class="card-text">Learn by watching videos and practicing hands-on programming.</p>
                          <a href="https://www.youtube.com/results?search_query=programming+quizzes" class="btn btn-outline-dark btn-sm">Explore</a>
                      </div>
                  </div>
              </div>
        </div>
      </div>
    </div>

    <h1 style="margin-top: 80px;margin-bottom:20px;">About <span class="brandname">ProQuiZ</span></h1>

    <p style="margin-bottom: 25px;">Welcome to ProQuiz, a dynamic and interactive online learning platform designed for learners and educators alike. At ProQuiz, users have the freedom to create and add their own quizzes, fostering a collaborative and engaging learning environment. In addition to user-generated content, ProQuiz also offers a wide selection of expertly curated quizzes, ensuring a diverse range of topics to suit every learner's needs. Whether you're preparing for exams, honing your skills, or simply testing your knowledge, ProQuiz empowers you to learn and grow with ease. Join us and make learning a truly personalized experience!</p>

    

  </div>

  <div class="container-fluid">
      <footer class="text-center py-4" style="border-top: 1px solid black;">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-4">
                      <h5>Links</h5>
                      <a href="" style="text-decoration: none;color:darkgray">Login</a><br>
                      <a href="" style="text-decoration: none;color:darkgray">Leader Board</a><br>
                  </div>
                  <div class="col-md-4">
                      <h5>Contact</h5>
                      <p>Email: support@proquiz.com</p>
                      <p>Phone: +123 456 7890</p>
                  </div>
                  <div class="col-md-4 social-icons">
                      <h5>Follow Us</h5>
                      <a href="#"><i class="fab fa-facebook"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                  </div>
              </div>
              <hr>
              <p class="mb-0">&copy; 2024 ProQuiZ. All rights reserved.</p>
          </div>
      </footer>
  </div>

  <!--scripts-->
  <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>
</html>