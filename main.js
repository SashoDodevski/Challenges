let startDiv = document.querySelector("#startDiv");
let gameDiv = document.querySelector("#gameDiv");
let startButton = document.querySelector("#startButton");
let startOverButton = document.querySelector("#startOverButton");
let questionsDiv = document.querySelector("#questionsDiv");
let question = document.querySelector("#question");
let answerOptionsDiv = document.querySelector("#answerOptionsDiv");
let answeredQuestions = document.querySelector("#answeredQuestions");
let category = document.querySelector("#category");
let answeredQuestionsDiv = document.querySelector("#answeredQuestionsDiv");
let scoreDiv = document.querySelector("#scoreDiv");
let score = document.querySelector("#score");
let tryAgainDiv = document.querySelector("#tryAgainDiv");
let tryAgainButton = document.querySelector("#tryAgainButton");
let url = "https://opentdb.com/api.php?amount=20";
let localUrl = "index.html";
let scorePoints = 0;
let questionNumber = 1;
let maxNoOfQuestions = 20;
let questionId = 1;
location.href = "#quiz";
let correctAnswers = [];

startButton.setAttribute("href", `${localUrl}#question-${questionNumber}`);

startButton.addEventListener("click", function () {
  startDiv.classList.add("d-none");
  gameDiv.classList.remove("d-none");
  questionsDiv.classList.remove("d-none");
  answeredQuestionsDiv.classList.remove("d-none");
  let showNextQuestion = document.getElementById(questionNumber);
  showNextQuestion.classList.remove("d-none");
  answeredQuestions.innerHTML = `Completed ${questionNumber - 1}/20`;
});

startOverButton.addEventListener("click", function () {
  location.reload();
});

tryAgainButton.addEventListener("click", function () {
  location.reload();
});

score.classList.add("animate__animated")
score.classList.add("animate__pulse")

async function quizGame() {
  try {
    let response = await fetch(url);
    let data = await response.json();

    data.results.forEach((element) => {
      let answers = [];
      if (element.type === "multiple") {
        answers.push(element.correct_answer);
        answers.push(element.incorrect_answers[0]);
        answers.push(element.incorrect_answers[1]);
        answers.push(element.incorrect_answers[2]);
      } else if (element.type === "boolean") {
        answers.push(element.correct_answer);
        answers.push(element.incorrect_answers[0]);
        answers.push("");
        answers.push("");
      }

      let numbers = [0, 1, 2, 3];

      let number1 = Math.floor(Math.random() * numbers.length);
      let answer1 = answers[numbers[number1]];
      let number1pop = numbers[number1];
      numbers = numbers.filter(function (elements) {
        return elements !== number1pop;
      });

      let number2 = Math.floor(Math.random() * numbers.length);
      let answer2 = answers[numbers[number2]];
      let number2pop = numbers[number2];
      numbers = numbers.filter(function (elements) {
        return elements !== number2pop;
      });

      let number3 = Math.floor(Math.random() * numbers.length);
      let answer3 = answers[numbers[number3]];
      let number3pop = numbers[number3];
      numbers = numbers.filter(function (elements) {
        return elements !== number3pop;
      });

      let answer4 = answers[numbers[0]];

      if (questionId < 20) {
        questionsDiv.innerHTML += `
          <div class="text-left my-5 col-md-10 offset-md-1 w-100 border p-0 d-none" id="${questionId}">
              <p class="h5 bg-light p-4 m-0 border-bottom" id="question">${element.question}</p>
              <div id="answerOptionsDiv" class="d-flex justify-content-around p-3 w-100" name="#question-${questionId}">
                <a class="btn btn-outline-secondary answerOption animate__animated animate__fadeIn" role="button" id="question${questionId}option1" href="index.html#question-${questionId + 1}">${answer1}</a>
                <a class="btn btn-outline-secondary answerOption animate__animated animate__fadeIn" role="button" id="question${questionId}option2" href="index.html#question-${questionId + 1}">${answer2}</a>
                <a class="btn btn-outline-secondary answerOption animate__animated animate__fadeIn" role="button" id="question${questionId}option3" href="index.html#question-${questionId + 1}">${answer3}</a>
                <a class="btn btn-outline-secondary answerOption animate__animated animate__fadeIn" role="button" id="question${questionId}option4" href="index.html#question-${questionId + 1}">${answer4}</a>
              </div>
            <p class="font-weight-bold small bg-light m-0 p-2 pl-4 border-top" id="category">From category: "${element.category}"</p>
          </div>
        `;
      } else {
        questionsDiv.innerHTML += `
          <div class="text-left my-5 col-md-10 offset-md-1 w-100 border p-0 d-none" id="${questionId}">
            <p class="h5 bg-light p-4 m-0 border-bottom" id="question">${element.question}</p>
            <div id="answerOptionsDiv" class="d-flex justify-content-around p-3 w-100" name="#question-${questionId}">
              <a class="btn btn-outline-secondary answerOption animate__animated animate__fadeIn" role="button" id="question${questionId}option1" href="index.html#score">${answer1}</a>
              <a class="btn btn-outline-secondary answerOption animate__animated animate__fadeIn" role="button" id="question${questionId}option2" href="index.html#score">${answer2}</a>
              <a class="btn btn-outline-secondary answerOption animate__animated animate__fadeIn" role="button" id="question${questionId}option3" href="index.html#score">${answer3}</a>
              <a class="btn btn-outline-secondary answerOption animate__animated animate__fadeIn" role="button" id="question${questionId}option4" href="index.html#score">${answer4}</a>
            </div>
          <p class="font-weight-bold small bg-light m-0 p-2 pl-4 border-top" id="category">From category: "${element.category}"</p>
          </div>
        `;
      }

      let answerOption = document.querySelectorAll(".answerOption");

      let correctAnswer = element.correct_answer;
      correctAnswers.push(correctAnswer);

      answerOption.forEach((element) => {
        element.addEventListener("click", function () {
          if (questionNumber < maxNoOfQuestions) {
            let nextQuestion = questionNumber + 1;
            let showNextQuestion = document.getElementById(nextQuestion);
            let hideQuestion = document.getElementById(questionNumber);
            showNextQuestion.classList.remove("d-none");
            hideQuestion.classList.add("d-none");

            answeredQuestions.innerHTML = `Completed ${questionNumber}/20`;

            if (element.textContent == correctAnswers[questionNumber - 1]) {
              scorePoints++;
            }

            questionNumber++;
          } else {
            score.innerHTML = `Your score is ${scorePoints}/20`;
            startDiv.classList.add("d-none");
            gameDiv.classList.add("d-none");
            tryAgainDiv.classList.remove("d-none");
            questionsDiv.classList.add("d-none");
            answeredQuestionsDiv.classList.add("d-none");
            scoreDiv.classList.remove("d-none");
          }
        });
      });

      let option1 = document.querySelector(`#question${questionId}option1`);
      let option2 = document.querySelector(`#question${questionId}option2`);
      let option3 = document.querySelector(`#question${questionId}option3`);
      let option4 = document.querySelector(`#question${questionId}option4`);

      if (option1.textContent === "") {
        option1.classList.add("d-none");
      }
      if (option2.textContent === "") {
        option2.classList.add("d-none");
      }
      if (option3.textContent === "") {
        option3.classList.add("d-none");
      }
      if (option4.textContent === "") {
        option4.classList.add("d-none");
      }

      questionId++;
    });
  } catch (err) {
    console.error(err);
  }
}

window.onload = quizGame();
