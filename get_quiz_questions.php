<?php
include "includes/config.php";

// require 'includes/emailSender.php';

$error  = false;
$erroMessage = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle GET request
    if (isset($_GET['action']) && $_GET['action'] === 'get_quiz_questions') {
    
        // Fetch quiz questions
        try {
            $stmt = $pdo->query("SELECT `id`, `question_text`, `option1`, `option2`, `option3`, `option4` FROM mcq_questions");
            $mcqQuestions = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($mcqQuestions);
        } catch (PDOException $e) {
            // Handle database connection or query errors
            http_response_code(500);
            echo json_encode(["error" => "Error fetching questions: " . $e->getMessage()]);
        }
    } else {
        // Handle other GET requests or provide a default response
        http_response_code(400);
        echo json_encode(["error" => "Invalid GET request."]);
    }
} else {
    // Handle other request methods or provide a default response
    http_response_code(400);
    echo json_encode(["error" => "Invalid request method."]);
}






// Assuming you have a database connection here

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON data from the request body
    $jsonData = file_get_contents('php://input');
    $userAnswers = json_decode($jsonData, true);

    // Insert user answers into the user_submissions table
    try {
        $stmt = $pdo->prepare("INSERT INTO user_submissions (user_id, question_id, user_answer, submission_time) 
                               VALUES (:user_id, :question_id, :user_answer, NOW())");

        // Assuming 'user_id' is available in your session or from the user registration
        $user_id = 1; // Replace with actual user ID

        foreach ($userAnswers as $answer) {
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':question_id', $answer['question_id'], PDO::PARAM_INT);
            $stmt->bindParam(':user_answer', $answer['user_answer'], PDO::PARAM_STR);
            $stmt->execute();
        }

        // Send a success response back to the client (can include additional data if needed)
        echo json_encode(["success" => true]);
    } catch (PDOException $e) {
        // Handle database connection or query errors
        http_response_code(500);
        echo json_encode(["error" => "Error submitting questions: " . $e->getMessage()]);
    }
} 
