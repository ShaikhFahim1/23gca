<?php


include "includes/config.php";



// Function to validate member ID
function isValidMemberId($memberId)
{
    // Customize this function based on your validation criteria
    // For example, check if it's not empty and meets specific requirements
    return !empty($memberId);
}

// Check if the user registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_user'])) {
    // new variable

    $first_name = filter_input(INPUT_POST, 'first_name');
    $surname = filter_input(INPUT_POST, 'surname');
    $member_id = filter_input(INPUT_POST, 'member_id');
    $actuarial_assoc = filter_input(INPUT_POST, 'actuarial_assoc');
    $organization = filter_input(INPUT_POST, 'organization');
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $contact_no = filter_input(INPUT_POST, 'contact_no');


    // Validate member ID, contact number, and email
    if (isValidMemberId($member_id)) {
        // Check for duplicates based on member ID
        $stmt = $pdo->prepare("SELECT id FROM users WHERE member_id = :member_id");
        $stmt->bindParam(':member_id', $member_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Member ID is already registered, prevent form submission
            echo "<p>User with this member ID is already registered. Please use a different member ID.</p>";
        } else {
            // Save user information using PDO prepared statement for INSERT
            $stmt = $pdo->prepare("INSERT INTO users (first_name, surname, member_id, actuarial_assoc, organization, email, contact_no) 
            VALUES (:first_name, :surname, :member_id, :actuarial_assoc, :organization, :email, :contact_no)");

            $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
            $stmt->bindParam(':member_id', $member_id, PDO::PARAM_STR);
            $stmt->bindParam(':actuarial_assoc', $actuarial_assoc, PDO::PARAM_STR);
            $stmt->bindParam(':organization', $organization, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':contact_no', $contact_no, PDO::PARAM_STR);
            $stmt->execute();

            // Set a cookie to track user submission
            setcookie('user_submitted', true, time() + (86400 * 30), "/"); // 86400 = 1 day
        }
    } else {
        // Check for duplicates based on email and contact number
        $stmt = $pdo->prepare("SELECT user_id FROM users WHERE email = :email AND contact_no = :contact_no");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':contact_no', $contact_no, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Email and contact number combination is already registered, prevent form submission
            echo "<p>User with this email and contact number is already registered. Please use a different email or contact number.</p>";
        } else {
            // Prepare and execute the SQL query for user registration
            $stmt = $pdo->prepare("INSERT INTO users (first_name, surname, member_id, actuarial_assoc, organization, email, contact_no) 
            VALUES (:first_name, :surname, :member_id, :actuarial_assoc, :organization, :email, :contact_no)");

            $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
            $stmt->bindParam(':member_id', $member_id, PDO::PARAM_STR);
            $stmt->bindParam(':actuarial_assoc', $actuarial_assoc, PDO::PARAM_STR);
            $stmt->bindParam(':organization', $organization, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':contact_no', $contact_no, PDO::PARAM_STR);
            $stmt->execute();

            // Set a cookie to track user submission
            setcookie('user_submitted', true, time() + (86400 * 30), "/"); // 86400 = 1 day
        }
    }
}

// Check if the user has submitted the MCQs before displaying the form
$userSubmitted = isset($_COOKIE['user_submitted']) && $_COOKIE['user_submitted'] == true;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Weekly Contest - 23rd GCA</title>

    <?php
    include "includes/header_includes.php";
    ?>
    <style>
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 999;
        }

        .popup {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        /* mcq question */
        .question-container {
            margin-bottom: 20px;
        }

        .options-container {
            margin-top: 10px;
        }

        .hidden {
            display: none;
        }
    </style>

</head>

<body class="body-wrapper">


    <!--========================================
=            Navigation Section            =
=========================================-->
    <?php
    include "includes/header.php"
    ?>
    <!--================================
=            Page Title            =
=================================-->

    <!-- <section class="page-title bg-title overlay-dark">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<div class="title">
						<h3>Weekly Contest</h3>
					</div>
					<ol class="breadcrumb justify-content-center p-0 m-0">
						<li class="breadcrumb-item"><a href="index">Home</a></li>
						<li class="breadcrumb-item active">Weekly Contest</li>
					</ol>
				</div>
			</div>
		</div>
	</section> -->

    <!--====  End of Page Title  ====-->


    <!--==============================
=            Speakers            =
===============================-->

    <section class="section schedule">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h3>Live <span class="alternate">Contest</span></h3>
                        <p>Engage, Learn, and Compete: Immerse Yourself in the Thrilling Atmosphere of Our Live Weekly Quiz Event!</p>
                    </div>
                </div>
            </div>
            <?php
            // Check if the user has submitted the MCQs
            $mcqSubmitted = isset($_COOKIE['mcq_submitted']) && $_COOKIE['mcq_submitted'] == true;

            if (!$userSubmitted) {
                // Display user registration form if not submitted or after a page refresh
            ?>

                <div class="row">
                    <div class="col-12">
                        <div class="schedule-tab">
                            <ul class="nav nav-pills text-center">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#nov20" data-toggle="pill">
                                        Step 01
                                        <span>Register yourself</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#nov21">
                                        Step 02
                                        <span>Apply for Quiz</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="schedule-contents bg-schedule">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active schedule-item" id="nov20">

                                    <div class="p-5">
                                        <form id="userForm" method="post" action="">

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="first_name" class="form-label">First Name:</label>
                                                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="surname" class="form-label">Surname:</label>
                                                    <input type="text" class="form-control" id="surname" name="surname" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="member_id" class="form-label">Member ID:</label>
                                                    <input type="text" class="form-control" id="member_id" name="member_id">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="actuarial_assoc" class="form-label">Actuarial Association:</label>
                                            
                                                    <select class="form-control" id="actuarial_assoc" name="actuarial_assoc" required>
                                                    <option value="">&lt;--Select Association--&gt;</option>
                                                    <option>Institute &amp; Faculty of Actuaries</option>
                                                    <option>Casualty Actuarial Society</option>
                                                    <option>Actuarial Society of South Africa</option>
                                                    <option>Society of Actuaries</option>
                                                    <option>Institute of Chartered Accountants of India</option>
                                                    <option>Chartered Financial Analyst</option>
                                                    <option>Insurance Institute of India</option>
                                                    <option">Institute of Insurance and Risk Management</option>
                                                    <option">Indian Statistical Institute</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="organization" class="form-label">Organization:</label>
                                                    <input type="text" class="form-control" id="organization" name="organization" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email:</label>
                                                    <input type="email" class="form-control" id="email" name="email" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="contact_no" class="form-label">Contact No:</label>
                                                    <input type="tel" class="form-control" id="contact_no" name="contact_no" required>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" class="btn btn-primary"  name="submit_user">Submit User Form</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>


            <?php
            } elseif (!$mcqSubmitted) {
                // Display MCQs only if the user has not submitted them
            ?>
                <div class="row">
                    <div class="col-12">
                        <div class="schedule-tab">
                            <ul class="nav nav-pills text-center">
                                <li class="nav-item">
                                    <a class="nav-link " href="#nov20" data-toggle="pill">
                                        Step 01
                                        <span>Register yourself</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#nov21">
                                        Step 02
                                        <span>Apply for Quiz</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="schedule-contents bg-schedule">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active schedule-item" id="nov21">

                                    <div class="p-5">

                                        <!-- MCQ Question Form -->


                                        <div class="">
                                            <div id="questionForm">
                                                
                                                <div class="question-container">
                                                    <p id="questionText"></p>
                                                </div>
                                                <div class="options-container" id="optionsContainer">
                                                    <!-- Options will be dynamically inserted here -->
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <button class="btn btn-primary" id="prevBtn" onclick="prevQuestion()">Previous</button>
                                                    </div>
                                                    <div class="col text-end">
                                                        <button class="btn btn-primary" id="nextBtn" onclick="nextQuestion()">Next</button>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col text-end">
                                                        <button class="btn btn-success" id="submitBtn" onclick="submitQuestions()">Submit</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="alert alert-success hidden" id="successMessage">
                                                <strong>Success!</strong> Questions submitted successfully.
                                            </div>
                                        </div>


                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>

            <?php
                // Set a cookie to track MCQ submission
                setcookie('mcq_submitted', true, time() + (86400 * 30), "/"); // 86400 = 1 day
            } else {
                // Display user registration form if the MCQs are already submitted
                echo "<p>You have already submitted the MCQs. Thank you!</p>";
            }
            ?>


        </div>
    </section>

    <!--====  End of Speakers  ====-->


    <?php
    include "includes/footer.php";
    include "includes/footer_includes.php";
    ?>

    <!-- JavaScript -->
    <!-- JavaScript -->
    <script>
        // Initialize the question form
document.addEventListener("DOMContentLoaded", function() {
    fetchQuestions();
});

let currentQuestionIndex = 0;

// Fetch questions from the server
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

// Display the current question and options with radio buttons
function displayQuestion() {
    const currentQuestion = mcqQuestions[currentQuestionIndex];
    document.getElementById("questionText").textContent = currentQuestion.question_text;

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
        optionRadio.value = currentQuestion[optionName];
        optionRadio.onclick = () => selectOption(index);

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
}


// Handle option selection
function selectOption(optionIndex) {
    // Add logic to handle selected option (if needed)
    console.log("Selected option:", mcqQuestions[currentQuestionIndex].options[optionIndex]);
}

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
            question_id: question.id, // Assuming there's an 'id' column in mcq_questions table
            user_answer: selectedOptions[index], // Include the selected option (modify as needed)
        };
    });

    // Send data to the server using fetch
    fetch("./submit_questions", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(userAnswers),
    })
    .then(response => response.json())
    .then(data => {
        // Handle success (data may contain any additional information from the server)
        alert("Questions submitted successfully!");
        document.getElementById("successMessage").classList.remove("hidden");
    })
    .catch(error => {
        // Handle error
        console.error("Error submitting questions:", error);
    });
}

       

    </script>


</body>

</html>