
        // Initialize the question form
document.addEventListener("DOMContentLoaded", function() {
    fetchQuestions();
});

let currentQuestionIndex = 0;

// Fetch questions from the server
function fetchQuestions() {
    fetch("./get_quiz_questions?action=get_quiz_questions") // Corrected the file extension to .php
        .then(response => response.json())
        .then(data => {
            mcqQuestions = data;
            displayQuestion();
        })
        .catch(error => console.error("Error fetching questions:", error));
}
// Initialize the selectedOptions array
let selectedOptions = [];

function displayQuestion() {
    const currentQuestion = mcqQuestions[currentQuestionIndex];
    document.getElementById("questionText").innerHTML = `Q. ${currentQuestionIndex + 1} ` + currentQuestion.question_text;

    const optionsContainer = document.getElementById("optionsContainer");
    optionsContainer.innerHTML = ""; // Clear previous options

    // Add radio buttons for each option
    const optionNames = ["option1", "option2", "option3", "option4"];
    optionNames.forEach((optionName, index) => {
        const formCheckDiv = document.createElement("div");
        formCheckDiv.className = "form-check";

        const optionRadio = document.createElement("input");
        optionRadio.type = "radio";
        optionRadio.className = "form-check-input";
        optionRadio.name = "options";
        optionRadio.id = `option${index + 1}`; // Generating unique IDs for each radio button
        optionRadio.value = index; // Use the index as the value
        optionRadio.onclick = () => selectOption(currentQuestion.question_id, index);

        // Check if the option is selected for the current question
        if (selectedOptions[currentQuestion.question_id] !== undefined && selectedOptions[currentQuestion.question_id] === index) {
            optionRadio.checked = true;
        }

        const optionLabel = document.createElement("label");
        optionLabel.className = "form-check-label";
        optionLabel.htmlFor = `option${index + 1}`;
        optionLabel.textContent = currentQuestion[optionName];

        formCheckDiv.appendChild(optionRadio);
        formCheckDiv.appendChild(optionLabel);

        optionsContainer.appendChild(formCheckDiv);
    });

    // Update navigation button visibility
    document.getElementById("prevBtn").style.display = (currentQuestionIndex === 0) ? "none" : "inline";
    document.getElementById("nextBtn").style.display = (currentQuestionIndex === mcqQuestions.length - 1) ? "none" : "inline";
    document.getElementById("submitBtn").style.display = (currentQuestionIndex === mcqQuestions.length - 1) ? "inline" : "none";

    // Enable the "Next" button only if an option is selected
    const nextBtn = document.getElementById("nextBtn");
    nextBtn.disabled = selectedOptions[currentQuestion.question_id] === undefined;
}

// Other functions and code in your script



// Function to handle option selection
function selectOption(question_id, index) {


    // Initialize the selectedOptions array for the current question if not already initialized
    if (!selectedOptions[question_id]) {
        selectedOptions[question_id] = [];
    }

    // Update the selectedOptions array for the current question
    selectedOptions[question_id] = index;

    // Log the selected question_id and user_answer for testing
  //  console.log(`Selected Question ID: ${question_id}, User Answer: ${index}`);
   //  console.log(`Till Date: ` + selectedOptions);
       // Enable the "Next" button if an option is selected
       const nextBtn = document.getElementById("nextBtn");
    nextBtn.removeAttribute("disabled");
    if(currentQuestionIndex === mcqQuestions.length - 1){
        document.getElementById("submitBtn").removeAttribute("disabled");
    }
}

// Other functions and code in your script


// Move to the previous question
function prevQuestion() {
    if (currentQuestionIndex > 0) {
        currentQuestionIndex--;
        displayQuestion();

    }
}

// Move to the next question
function nextQuestion() {
    if (currentQuestionIndex < mcqQuestions.length - 1) {
        currentQuestionIndex++;
        displayQuestion();
        
    }
}

// Submit questions and show success message
function submitQuestions() {
    // Prepare data for submission
    const userAnswers = mcqQuestions.map((question, index) => {
        return {
            question_id: question.question_id, // Assuming there's an 'id' column in mcq_questions table
            user_answer: selectedOptions[index+1], // Include the selected option (modify as needed)
        };
    });

    
    // Send data to the server using fetch
    fetch("./get_quiz_questions", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(userAnswers),
    })
    .then(response => response.json())
    .then(data => {
        // Handle success (data may contain any additional information from the server)
    //    alert("Questions submitted successfully!");
     //   document.getElementById("successMessage").classList.remove("hidden");
        document.getElementById("questionForm").innerHTML = '<div class="text-center">'+
        '<h4 class="card-title">Thank you for participating!</h4>'+
        '<p class="card-text mb-2">The winner will be notified through email.</p>'+
        '<a href="./index" class="btn btn-primary">Go to Home Page</a>'+
    '</div>';
    })
    .catch(error => {
        // Handle error
        console.error("Error submitting questions:", error);
    });
}

function confirmSubmit() {
    // Show a confirmation dialog
    const isConfirmed = confirm("Are you sure you want to submit your answers?");

    if (isConfirmed) {
        // User clicked "OK" in the confirmation dialog
        submitQuestions();
    } else {
        // User clicked "Cancel" or closed the confirmation dialog
        // Handle accordingly or do nothing
    }
}

    
    
