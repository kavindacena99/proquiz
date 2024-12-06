<?php
    require_once 'connection/connection.php';
?>
<?php

    /*

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

    //Return questions as JSON
    header('Content-Type: application/json');
    json_encode($questions);
    //echo json_encode($questions[0]["id"]);
    */


    $sql = "SELECT * FROM quizzes";
    $result = mysqli_query($connection,$sql);

    $questions = array();

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


    echo json_encode($questions);

    //header('Content-Type: application/json');

    
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
        fetch('quizes.php').then(response => response.json()).then(questions => { let output = ''; questions.forEach(row => { output += `<p>${row.column_name}</p>`;  }); document.getElementById('f').innerHTML = output; });
    </script>
</body>
</html>

<?php

/*

        let questions = [{"id":"1","question":"What is the capital of France?","options":["Berlin","Paris","London","Madrid"],"correct_option":"1"}];
        let currentQuestionIndex = 0;

        function fetchQuestions(){
            fetch("quizzes.php").then(response => response.json()).then(data => { questions = data; loadQuestion(currentQuestionIndex); }).catch(error => console.error("Error fetching:", error));
        }

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







        let questions = [];
let currentQuestionIndex = 0;

// Fetch questions from the database
function fetchQuestions() {
  fetch("quizes.php")
    .then(response => response.json())
    .then(data => {
      questions = data;
      loadQuestion(currentQuestionIndex);
    })
    .catch(error => console.error("Error fetching questions:", error));
}

// Function to load a question
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

// Handle Next Question button click
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

// Initial call to fetch questions
fetchQuestions();


*/



?>