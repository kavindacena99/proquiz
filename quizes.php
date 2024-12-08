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
</head>
<body>
    <h1>Kavinda</h1>
    <main>
      <div id="quiz-container" class="question-card">
        <!-- Quiz content will be dynamically loaded here -->
      </div>
      <button id="next-btn" class="submit-btn" disabled>Next Question</button>
    </main>

    <h1 id="f"></h1>

    <script>
      let questions;
      
      //let questions = [{"id":"1","question":"What is the capital of France?","options":["Berlin","Paris","London","Madrid"],"correct_option":"1"}];

      let currentQuestionIndex = 0;
      let marks = 0;

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
        `;

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
        currentQuestionIndex++;
        if (currentQuestionIndex < questions.length) {
          loadQuestion(currentQuestionIndex);
          document.getElementById("next-btn").disabled = true;
        } else {
          document.getElementById("quiz-container").innerHTML = `
            <h2>You've completed the quiz!</h2>
            <p>Thank you for participating.</p>
          `;
          document.getElementById("next-btn").style.display = "none";
        }
      });

      fetchQuestions();


    </script>
</body>
</html>