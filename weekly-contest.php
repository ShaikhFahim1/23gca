<?php


include "includes/config.php";

$error = false;
$errorMessage = '';

// Function to validate member ID
function isValidMemberId($memberId)
{
    // Customize this function based on your validation criteria
    // For example, check if it's not empty and meets specific requirements
    return !empty($memberId);
}

// Check if the user registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_user'])) {
   
    $first_name = filter_input(INPUT_POST, 'first_name');
    $surname = filter_input(INPUT_POST, 'surname');
    $member_id = isset($_POST['member_id']) ? htmlspecialchars($_POST['member_id']) : '';
    $actuarial_assoc = filter_input(INPUT_POST, 'actuarial_assoc');
    $organization = filter_input(INPUT_POST, 'organization');
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $contact_no = filter_input(INPUT_POST, 'contact_no');

    if($member_id !='' && $member_id !=0){
        // Check for duplicates based on member ID
        $stmt = $pdo->prepare("SELECT id FROM users WHERE member_id = :member_id");
        $stmt->bindParam(':member_id', $member_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result){
        // Member ID is already registered, prevent form submission
        $error = true;
        $errorMessage = 'User with this member ID is already registered. Please use a different member ID.';
        }
    }
    if(!empty(trim($email)) && !empty(trim($contact_no))){
              // Check for duplicates based on email and contact number
              $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email OR contact_no = :contact_no");
              $stmt->bindParam(':email', $email, PDO::PARAM_STR);
              $stmt->bindParam(':contact_no', $contact_no, PDO::PARAM_STR);
              $stmt->execute();
              $result = $stmt->fetch(PDO::FETCH_ASSOC);
              if ($result) {
                // Email and contact number combination is already registered, prevent form submission
                $error = true;
                $errorMessage = 'User with this email or contact number is already registered. Please use a different email or contact number.';
            } 
    }else{
        $error = true;
        $errorMessage = 'Please Enter Email Id & Contact No';
    }


        if (!$error) {
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
                    // Get the last inserted userid
        
                    $lastInsertedId = $pdo->lastInsertId();
                    session_start();
                    $_SESSION['user_id'] = $lastInsertedId;
                    // Set a cookie to track user submission
                    setcookie('user_submitted', true, time() + (86400 * 30), "/"); // 86400 = 1 day
                    $_COOKIE['user_submitted'] = true;
                    header('location:./weekly-contest#mcq_div');
           
        }
        
     
    
}else{
    $actuarial_assoc = '';
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
            margin-bottom: 20px;
        }
        
        .hidden {
            display: none;
        }
        .success-card {
            width: 300px;
            margin: 20px auto;
        }

        .success-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: scale(1.05);
        }
        #nov20 a{
            color: #007bff;
            cursor: pointer;
        }
        form#userForm label{
            color: #000;
        }
        .section-title{
            margin-bottom: 25px ;
        }
        span.alternate {
    
    font-style: normal;
    font-weight: 600;
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
                <div class="col-md-6 offset-md-3 col-sm-12 mb-4">
                    <div class="section-title">
                        <h3><span class="alternate">Coffee Table</span> Quiz Contest</h3>
                        <p>12th January - 19th January 2024 (Upto 15:00 hrs)</p>
                        
                    </div>
                    <div>
                    <img src="assets/images/weekly contest.png" alt="" style="width: 100%;">
                    </div>
                </div>
                <hr>
                
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
                                        <span>Provide your details</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#nov21">
                                        Step 02
                                        <span>Take the quiz</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="schedule-contents bg-schedule">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active schedule-item" id="nov20">

                                    <div class="p-5">
                                    <?php
                                    // Display success message if set in the URL
                                    if ((!$error)  && $errorMessage !='') {
                                        echo '<div class="alert alert-success" id="successMessage"> ' . $errorMessage . '</div>';
                                    }elseif(($error)  && $errorMessage !=''){
                                        echo '<div class="alert alert-danger" id="successMessage"> ' . $errorMessage . '</div>';
                                    }
                                    ?>
                                    <form id="userForm" method="post" action="">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="first_name" class="form-label">First Name <span class="astric">*</span></label>
                                                <input type="text" class="form-control" id="first_name" name="first_name" required
                                                    value="<?php echo isset($first_name) ? $first_name : ''; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="surname" class="form-label">Surname <span class="astric">*</span></label>
                                                <input type="text" class="form-control" id="surname" name="surname" required
                                                    value="<?php echo isset($surname) ? $surname : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="member_id" class="form-label">Member ID </label>
                                                <input type="number" class="form-control" id="member_id" name="member_id"
                                                    value="<?php echo isset($member_id) ? $member_id : ''; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="actuarial_assoc" class="form-label">Actuarial Association </label>
                                                <select class="form-control" id="actuarial_assoc" name="actuarial_assoc"    >
                                                    <option value="" <?php echo empty($actuarial_assoc) ? 'selected' : ''; ?>>Select
                                                        Association</option>
                                                    <option value="Institute of Actuaries of India"
                                                        <?php echo ($actuarial_assoc == 'Institute of Actuaries of India') ? 'selected' : ''; ?>>
                                                        Institute of Actuaries of India</option>
                                                    <option value="Institute & Faculty of Actuaries"
                                                        <?php echo ($actuarial_assoc == 'Institute & Faculty of Actuaries') ? 'selected' : ''; ?>>
                                                        Institute &amp; Faculty of Actuaries</option>
                                                    <option value="Casualty Actuarial Society"
                                                        <?php echo ($actuarial_assoc == 'Casualty Actuarial Society') ? 'selected' : ''; ?>>
                                                        Casualty Actuarial Society</option>
                                                    <option value="Actuarial Society of South Africa"
                                                        <?php echo ($actuarial_assoc == 'Actuarial Society of South Africa') ? 'selected' : ''; ?>>
                                                        Actuarial Society of South Africa</option>
                                                    <!-- Add other options as needed -->
                                                    
                                                    <option>Society of Actuaries</option>
                                                                                <option>Institute of Chartered Accountants of India</option>
                                                                                <option>Chartered Financial Analyst</option>
                                                                                <option>Insurance Institute of India</option>
                                                                                <option>Institute of Insurance and Risk Management</option>
                                                                                <option>Indian Statistical Institute</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="organization" class="form-label">Organization <span class="astric">*</span></label>
                                                <input type="text" class="form-control" id="organization" name="organization" required
                                                    value="<?php echo isset($organization) ? $organization : ''; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email" class="form-label">Email <span class="astric">*</span></label>
                                                <input type="email" class="form-control" id="email" name="email" required
                                                    value="<?php echo isset($email) ? $email : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="contact_no" class="form-label">Contact No <span class="astric">*</span></label>
                                                <input type="number" class="form-control" id="contact_no" name="contact_no" required
                                                    value="<?php echo isset($contact_no) ? $contact_no : ''; ?>">
                                            </div>
                                            <div class="col-md-6" style="display: flex;align-items: center;">
                                                <input type="checkbox" required>&nbsp;&nbsp;I agree to <a data-toggle="modal"
                                                    data-target="#weeklyContestModal">&nbsp;terms & conditions</a>.*
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" name="submit_user">Submit User Form</button>
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
                <div class="row" id="mcq_div">
                    <div class="col-12">
                        <div class="schedule-tab">
                            <ul class="nav nav-pills text-center">
                                <li class="nav-item">
                                    <a class="nav-link " href="#nov20" data-toggle="pill">
                                        Step 01
                                        <span>Provide your details</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#nov21">
                                        Step 02
                                        <span>Take the quiz</span>
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
                                                    <div class="col text-center">
                                                        <button class="btn btn-success" id="submitBtn" onclick="confirmSubmit()" disabled>Submit</button>
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
                            
            } else {
               ?>
               <div class="text-center"><h4 class="card-title">Thank you for participating!</h4><p class="card-text mb-2">The winner will be notified through email.</p><a href="./index" class="btn btn-primary">Go to Home Page</a></div>
               <?php
            }
            ?>


        </div>
    </section>

    <!--====  End of Speakers  ====-->


    <?php
    include "includes/footer.php";
    include "includes/footer_includes.php";
    ?>

<!-- Modal -->
<div class="modal fade" id="weeklyContestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Terms & conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height: 400px;overflow-y: auto;">
        <p style='font-size:11.0pt;line-height:normal;'><strong><u><span style='font-size:16px;color:red;'>Weekly Contests!</span></u></strong></p>
        <p style='font-size:11.0pt;line-height:normal;'><strong><span style='font-size:16px;color:#666666;'>&nbsp;</span></strong></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#666666;'>Get ready for the weekly fun contest starting form 12th January 2024 till 09th February 2024 and win exciting prizes! We promise that these are easier than actuarial exams and certainly a lot more fun :)</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#666666;'>&nbsp;</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#666666;'>Watch out this space for regular updates. We have a fresh contest plan for every week starting now up until GCA 2024!</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><strong><span style='font-size:16px;color:#F85D5D;'>&nbsp;</span></strong></p>
        <p style='font-size:11.0pt;line-height:normal;'><strong><span style='font-size:16px;color:#F85D5D;'>Overall T&amp;C of the contest</span></strong></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>1.&nbsp;</span><strong><span style='font-size:16px;color:#374151;'>Eligibility:</span></strong></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;xcolor:#374151;'>○</span><span style='font-size:16px;color:#374151;'>&nbsp;The contest is open to all.&nbsp;</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>&nbsp;</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>2.&nbsp;</span><strong><span style='font-size:16px;color:#374151;'>Submission Guidelines:</span></strong></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>○</span><span style='font-size:16px;color:#374151;'>&nbsp;Submissions must adhere to the theme specified for the contest.</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>○</span><span style='font-size:16px;color:#374151;'>&nbsp;Any inappropriate or offensive content will result in disqualification.</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>&nbsp;</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>3.&nbsp;</span><strong><span style='font-size:16px;color:#374151;'>Entry Deadline:</span></strong></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>○</span><span style='font-size:16px;color:#374151;'>&nbsp;All submissions must be received by the last date of the weekly contest.</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>Late entries will not be considered.</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><strong><span style='font-size:16px;color:white;'>3</span></strong></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>4.&nbsp;</span><strong><span style='font-size:16px;color:#374151;'>Selection of Winners:</span></strong></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>○</span><span style='font-size:16px;color:#374151;'>&nbsp;Winners will be selected by Judging Panel &amp; Community Vote based on</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>creativity, humour, and adherence to the theme.</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>○</span><span style='font-size:16px;color:#374151;'>&nbsp;The decision of the judges is final.</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>&nbsp;</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>5.&nbsp;</span><strong><span style='font-size:16px;color:#374151;'>Prizes:</span></strong></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>○</span><span style='font-size:16px;color:#374151;'>&nbsp;INR 10,000 e voucher will be awarded to the weekly winner.</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>○</span><span style='font-size:16px;color:#374151;'>&nbsp;Prizes are non-transferable, and no cash alternatives will be offered.</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>&nbsp;</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>6.&nbsp;</span><strong><span style='font-size:16px;color:#374151;'>Notification of Winners:</span></strong></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>○</span><span style='font-size:16px;color:#374151;'>&nbsp;Winners will be notified via email within 7 days of the contest closing date.</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>&nbsp;</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>7.&nbsp;</span><strong><span style='font-size:16px;color:#374151;'>Publicity:</span></strong></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>○</span><span style='font-size:16px;color:#374151;'>&nbsp;By entering the contest, participants grant IAI the right to use their names,</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>likenesses, and submitted content for promotional purposes without</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>additional compensation.</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>&nbsp;</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>8.&nbsp;</span><strong><span style='font-size:16px;color:#374151;'>Disqualification:</span></strong></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>○</span><span style='font-size:16px;color:#374151;'>&nbsp;IAI reserves the right to disqualify any participant who violates the terms</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>and conditions or engages in any fraudulent or unethical behaviour.</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>&nbsp;</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>9.&nbsp;</span><strong><span style='font-size:16px;color:#374151;'>Amendments:</span></strong></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>○</span><span style='font-size:16px;color:#374151;'>&nbsp;IAI reserves the right to amend or modify these terms and conditions at</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>any time. Participants will be notified of any changes.</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>&nbsp;</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>10.</span><strong><span style='font-size:16px;color:#374151;'>Legal Compliance:</span></strong></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>○</span><span style='font-size:16px;color:#374151;'>&nbsp;The contest is subject to all applicable laws and regulations and is void</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>where prohibited.</span></p>
        <p style='font-size:11.0pt;line-height:normal;'><span style='font-size:16px;color:#374151;'>By participating in the contest, participants indicate their understanding and acceptance of these terms and conditions.</span></p>
      </div>

      
    </div>
  </div>
</div>
    <!-- JavaScript -->
    <!-- JavaScript -->

    <script src="assets/js/weekly-contest-w1.js"></script>
    

</body>

</html>