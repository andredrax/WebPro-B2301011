// Array of questions
let questions = [
    { type: 'objective', text: 'What is the unit of length in the metric system?', options: ['Meter', 'Kilogram', 'Liter', 'Second'], answer: '' },
    { type: 'objective', text: 'What instrument is used to measure mass?', options: ['Thermometer', 'Barometer', 'Balance', 'Caliper'], answer: '' },
    { type: 'objective', text: 'Which of the following is a unit of volume?', options: ['Square meter', 'Cubic meter', 'Meter', 'Kilometer'], answer: '' },
    { type: 'objective', text: 'What is the SI unit of temperature?', options: ['Celsius', 'Fahrenheit', 'Kelvin', 'Rankine'], answer: '' },
    { type: 'objective', text: 'What does a stopwatch measure?', options: ['Length', 'Mass', 'Time', 'Temperature'], answer: '' },
    { type: 'theory', text: 'Explain the difference between mass and weight.', answer: '' },
    { type: 'theory', text: 'Describe the process of measuring the volume of an irregular object.', answer: '' },
    { type: 'theory', text: 'How do you convert Celsius to Fahrenheit?', answer: '' },
    { type: 'theory', text: 'What is the significance of significant figures in measurements?', answer: '' },
    { type: 'theory', text: 'Explain how to use a vernier caliper.', answer: '' },
];

let currentQuestionIndex = 0; // Current question index
let timerInterval; // Interval variable for timer

// Function to start when DOM content is loaded
document.addEventListener('DOMContentLoaded', () => {
    displayQuestion(currentQuestionIndex); // Display first question
    startTimer(15); // Start timer for 15 minutes

    // Event listener for Enter key to navigate to next question
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevent default form submission on Enter key
            nextQuestion();
        }
    });

    // Add crocodile image beside the question card
    const questionContainer = document.getElementById('question-container');
    const crocImg = document.createElement('img');
    crocImg.src = 'crocodile.jpeg';  // Replace with your image path
    crocImg.alt = 'Crocodile Cartoon';
    crocImg.classList.add('crocodile-img');
    questionContainer.appendChild(crocImg);
});

// Function to display current question
function displayQuestion(index) {
    const questionCard = document.getElementById('question-card');
    questionCard.innerHTML = ''; // Clear existing content

    const question = questions[index]; // Get current question
    const questionElement = document.createElement('div');
    questionElement.classList.add('question');

    const questionText = document.createElement('h2');
    questionText.innerText = question.text;
    questionElement.appendChild(questionText);

    // Check question type and create appropriate elements
    if (question.type === 'objective') {
        const optionsContainer = document.createElement('div');
        optionsContainer.classList.add('options');

        // Create options for multiple choice questions
        question.options.forEach((option, optionIndex) => {
            const optionElement = document.createElement('div');
            optionElement.classList.add('option');

            const radioInput = document.createElement('input');
            radioInput.type = 'radio';
            radioInput.name = `question-${index}-options`;
            radioInput.value = option;
            radioInput.id = `question-${index}-option-${optionIndex}`;
            radioInput.onchange = () => selectOption(option);

            const optionLabel = document.createElement('label');
            optionLabel.setAttribute('for', `question-${index}-option-${optionIndex}`);
            optionLabel.innerText = option;

            optionElement.appendChild(radioInput);
            optionElement.appendChild(optionLabel);
            optionsContainer.appendChild(optionElement);
        });

        questionElement.appendChild(optionsContainer);
    } else if (question.type === 'theory') {
        // Create textarea for theory questions
        const answerInput = document.createElement('textarea');
        answerInput.placeholder = 'Type your answer here...';
        answerInput.value = question.answer; // Set answer if already answered
        answerInput.oninput = (e) => questions[index].answer = e.target.value;
        questionElement.appendChild(answerInput);
    }

    questionCard.appendChild(questionElement);

    populateQuestionNav(); // Update question navigation dots
    updateProgressBar(); // Update progress bar
}

// Function to select an option for multiple choice questions
function selectOption(option) {
    questions[currentQuestionIndex].answer = option;
    // No progress bar update here
}

// Function to move to previous question
function prevQuestion() {
    if (currentQuestionIndex > 0) {
        currentQuestionIndex--;
        displayQuestion(currentQuestionIndex);
    }
}

// Function to move to next question
function nextQuestion() {
    if (currentQuestionIndex < questions.length - 1) {
        currentQuestionIndex++;
        displayQuestion(currentQuestionIndex);
        updateProgressBar(); // Update progress bar after displaying the next question
    }
}

// Function to populate question navigation dots
function populateQuestionNav() {
    const questionNav = document.getElementById('question-nav');
    questionNav.innerHTML = ''; // Clear existing dots

    // Create dots for each question
    questions.forEach((question, index) => {
        const navItem = document.createElement('li');
        navItem.innerText = index + 1;
        navItem.onclick = () => goToQuestion(index);
        if (index === currentQuestionIndex) {
            navItem.classList.add('active'); // Highlight current question
        }
        questionNav.appendChild(navItem);
    });
}

// Function to move to a specific question
function goToQuestion(index) {
    currentQuestionIndex = index;
    displayQuestion(currentQuestionIndex);
}

// Function to update progress bar based on answered questions
function updateProgressBar() {
    const progressBarInner = document.getElementById('progress-bar-inner');
    const answeredQuestions = questions.filter(q => q.answer !== '').length;
    const progressPercentage = (answeredQuestions / questions.length) * 100;
    progressBarInner.style.width = `${progressPercentage}%`;
}

// Function to start timer for the quiz
function startTimer(minutes) {
    let time = minutes * 60;
    const timerElement = document.getElementById('timer');
    timerInterval = setInterval(() => {
        const minutes = Math.floor(time / 60);
        const seconds = time % 60;
        timerElement.innerText = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        if (time <= 0) {
            clearInterval(timerInterval);
            alert('Time is up!');
            // Add any submission logic here
        }
        time--;
    }, 1000);
}
