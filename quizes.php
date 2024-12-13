<?php
    require_once 'connection/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;900&display=swap" rel="stylesheet">
    <style>
      .brandname{
        font-family: "Montserrat", sans-serif;
        font-weight: bolder;
      }
      .navborder{
        border-bottom: 1px solid black;
      }
      .notations{
        color: darkslategray;
      }
    </style>
</head>
<body>
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg bg-body-tertiary navborder">
        <div class="container-fluid">
          <a class="navbar-brand brandname" style="font-size: 28px;" href="index.php">ProQuiZ</a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <form class="d-flex" role="search">
              <h4 class="me-2" style="margin-top: 5px;color:darkgrey;">Category: <span id="cat" class="notations">OOP</span> &nbsp; Programming Language: <span id="lang" class="notations">Java</span> &nbsp; Scores: <span id="score"  class="notations">0</span></h4>
            </form>
          </div>
        </div>
      </nav>
    </div>

    <div class="container">
      <div class="mt-5">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="quiz-container p-4">
                <div id="quiz-container">

                </div>
              <button id="next-btn" class="btn w-100 mt-3" style="background-color:darkslategray;color:white" disabled>Next Question</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>

      let questions;
      
      //let questions = [{"id":"1","question":"What is the capital of France?","options":["Berlin","Paris","London","Madrid"],"correct_option":"1"}];

      let currentQuestionIndex = 0;
      let marks = 0;
      let userAnswers = [];
      //let correctAnswer;

      function loadQuestion(index) {
        const quizContainer = document.getElementById("quiz-container");
        const question = questions[index];

        quizContainer.innerHTML = `
          <h2>Question ${index + 1} of ${questions.length}</h2>
          <p class="question-text">${question.question}</p>
          <ul class="options-list">
            ${question.options
              .map(
                (option, i) => `
              <li>
                <input type="radio" name="answer" id="option${i}" value="${i}">
                <label for="option${i}">${option}</label>
              </li>
            `
              )
              .join("")}
          </ul>
          <input type="hidden" id="correct-answer" value="${question.correct_option}">
        `;

        //console.log("This is for testing: " + question[index][0]);

        // Enable the Next button once an option is selected
        const options = document.querySelectorAll('input[name="answer"]');

        options.forEach(option =>
          option.addEventListener("change", () => {
            document.getElementById("next-btn").disabled = false;
          })
        );
      }

      function fetchQuestions(){
          fetch("fetch.php").then(response => response.json()).then(data => { questions = data; loadQuestion(currentQuestionIndex); }).catch(error => console.error("Error fetching:", error));
      }

      document.getElementById("next-btn").addEventListener("click", () => {
        const selectedOption = document.querySelector('input[name="answer"]:checked');
        let correctAnswer = document.getElementById("correct-answer").value;

        if (selectedOption) {
          // Check if the selected answer matches the correct answer
          if (Number(selectedOption.value)+1 === Number(correctAnswer)) {  
            marks++;
          }
          userAnswers.push(Number(selectedOption.value)+1);
        }

        currentQuestionIndex++;
        updateScore();

        if (currentQuestionIndex < questions.length) {
          loadQuestion(currentQuestionIndex);
          document.getElementById("next-btn").disabled = true;
        } else {
          // we should implement parts to view marks and other things with redirecting other page
          document.getElementById("quiz-container").innerHTML = `
            <h2>You've completed the quiz!</h2>
            <p>Thank you for participating.</p>
          `;
          document.getElementById("next-btn").style.display = "none";
        }
      });

      function updateScore(){
        document.getElementById("score").innerText = `${marks}`;
      }

      fetchQuestions();

      console.log(marks);
    </script>
</body>
</html>