const continueBtn = document.querySelector('.start-btn');
const quizSection = document.querySelector('.quiz-section');
const quizBox = document.querySelector('.quiz-box');
const resultBox = document.querySelector('.result-box');
const nextBtn = document.querySelector('.next-btn');
const finishAttemptBtn = document.querySelector('.finishAttempt-btn');
const popup = document.querySelector('.popup');
const okBtn = document.querySelector('.popup button');

let questionCount = 0;
let questionNumb = 1;
let userScore = 0;
let progressEndValue = 0;

continueBtn.onclick = () => {
    quizSection.classList.add('active');
    quizBox.classList.add('active');

    showQuestions(0);
    questionCounter(1);
}

nextBtn.onclick = () => {
    if (questionCount < questions.length - 1) {
        questionCount++;
        showQuestions(questionCount);
        questionNumb++;
        questionCounter(questionNumb);
        nextBtn.classList.remove('active');
    } else {
        showResultBox();
    }
}

const optionList = document.querySelector('.option-list');

function showQuestions(index) {
    const questionText = document.querySelector('.question-text');
    questionText.textContent = `${questions[index].numb}. ${questions[index].question}`;

    let optionTag = '';
    for (let i = 0; i < questions[index].options.length; i++) {
        optionTag += `<div class="option"><span>${questions[index].options[i]}</span></div>`;
    }
    optionList.innerHTML = optionTag;

    const option = document.querySelectorAll('.option');
    for (let i = 0; i < option.length; i++) {
        option[i].addEventListener('click', () => optionSelected(option[i]));
    }
}

function optionSelected(answer) {
    let userAnswer = answer.textContent.trim();
    let correctAnswer = questions[questionCount].answer.trim();
    let allOptions = optionList.children.length;

    if (userAnswer === correctAnswer) {
        answer.classList.add('correct');
        userScore += 1;
        headerScore();
    } else {
        answer.classList.add('incorrect');
        for (let i = 0; i < optionList.children.length; i++) {
            if (optionList.children[i].textContent.trim().toLowerCase() === correctAnswer.toLowerCase()) {
                optionList.children[i].classList.add('correct');
            }
        }
    }

    for (let i = 0; i < allOptions; i++) {
        optionList.children[i].classList.add('disabled');
    }

    nextBtn.classList.add('active');
}

function questionCounter(index) {
    const questionTotal = document.querySelector('.question-total');
    questionTotal.textContent = `${index} of ${questions.length} Questions`;
}

function headerScore() {
    const headerScoreText = document.querySelector('.header-score');
    headerScoreText.textContent = `Score: ${userScore}/ ${questions.length}`;
}

function showResultBox() {
    quizBox.classList.remove('active');
    resultBox.classList.add('active');

    const scoreText = document.querySelector('.score-text');
    scoreText.textContent = `Your Score is ${userScore} out of ${questions.length}`;

    const circularProgress = document.querySelector('.circular-progress');
    const progressValue = document.querySelector('.progress-value');
    progressEndValue = (userScore / questions.length) * 100;

    progressValue.textContent = `${progressEndValue}%`;
    let angle = progressEndValue * 3.6;
    circularProgress.style.background = `conic-gradient(#3D589B ${angle}deg, rgba(255,255,255,.1) 0deg)`;
}

finishAttemptBtn.addEventListener('click', () => {
    // Set the value of the marks input field
    document.getElementById('marksInput').value = userScore;

    // Submit the form
    document.getElementById('marksForm').submit();
});

okBtn.addEventListener('click', () => {
    hidePopup();
});

function hidePopup() {
    popup.style.display = 'none';
}
