<?php

include "includes/config.php";

$error = false;
$errorMessage = '';

// Fetch memes data from 'memes' table
$stmt = $pdo->prepare("SELECT id, user_id, meme_image_url, meme_text FROM memes");
$stmt->execute();
$memes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch vote counts for each meme
$voteCounts = [];
foreach ($memes as $meme) {
    $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM votes WHERE id = ?");
    $stmt->execute([$meme['id']]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $voteCounts[$meme['id']] = $result['count'];
}

// Check if form was previously submitted and store values in cookies
if (isset($_COOKIE['user_full_name'])) {
    $userFullName = htmlspecialchars($_COOKIE['user_full_name']);
    $userMemberId = htmlspecialchars($_COOKIE['user_member_id']);
    $userActuarialAssociation = htmlspecialchars($_COOKIE['user_actuarial_association']);
    $userOrganisation = htmlspecialchars($_COOKIE['user_organisation']);
    $userEmail = htmlspecialchars($_COOKIE['user_email']);
    $userContact = htmlspecialchars($_COOKIE['user_contact']);
} else {
    // Set default values or fetch from database if needed
    $userFullName = '';
    $userMemberId = '';
    $userActuarialAssociation = '';
    $userOrganisation = '';
    $userEmail = '';
    $userContact = '';
}
// Handle form submission 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input (you may need to enhance validation based on your requirements)
    $fullName = htmlspecialchars($_POST["full_name"]);
    $memberId = htmlspecialchars($_POST["member_id"]);
    $actuarialAssociation = htmlspecialchars($_POST["actuarial_association"]);
    $organisation = htmlspecialchars($_POST["organisation"]);
    $email = htmlspecialchars($_POST["email"]);
    $contact = htmlspecialchars($_POST["contact"]);

    // Insert user data into 'users' table using PDO
    $stmt = $pdo->prepare("INSERT INTO users (full_name, member_id, actuarial_association, organisation, email, contact) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$fullName, $memberId, $actuarialAssociation, $organisation, $email, $contact]);

    // Get the last inserted user ID
    $userId = $pdo->lastInsertId();

    // Handle meme upload or text submission
    $selectedOption = $_POST["meme_type"];

    if ($selectedOption == "meme" && $_FILES["meme"]["size"] > 0 && in_array($_FILES["meme"]["type"], ["image/jpeg", "image/png", "image/gif"])) {
        // Handle meme upload (if a file is selected and is an image/gif)
        $targetDir = "uploads/"; // Specify your upload directory
        $targetFile = $targetDir . basename($_FILES["meme"]["name"]);

        // Check image size
        if ($_FILES["meme"]["size"] <= 2097152) { // 2 MB in bytes
            // Move the uploaded file to the target directory
            move_uploaded_file($_FILES["meme"]["tmp_name"], $targetFile);

            // Insert meme data into 'memes' table using PDO
            $stmt = $pdo->prepare("INSERT INTO memes (user_id, meme_image_url) VALUES (?, ?)");
            $stmt->execute([$userId, $targetFile]);
        } else {
            // Set a session message for image size exceeded
            $_SESSION['form_message'] = ['type' => 'danger', 'message' => 'Image size should be less than 2MB.'];
        }
    } elseif ($selectedOption == "text" && !empty($_POST["meme_text"])) {
        // Handle meme text submission (if the text is not empty)
        $memeText = htmlspecialchars($_POST["meme_text"]);

        // Insert meme data into 'memes' table using PDO
        $stmt = $pdo->prepare("INSERT INTO memes (user_id, meme_text) VALUES (?, ?)");
        $stmt->execute([$userId, $memeText]);
    }

    // Set a session message for successful submission
    $_SESSION['form_message'] = ['type' => 'success', 'message' => 'Form submitted successfully!'];

    // Set a cookie to remember that the form has been submitted
    setcookie('form_submitted', true, time() + (86400 * 30), "/"); // 86400 seconds = 1 day

    // Redirect to prevent form resubmission on page refresh
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
// Check for success or error message in the session
if (isset($_SESSION['form_message'])) {
    $formMessage = $_SESSION['form_message'];
    unset($_SESSION['form_message']); // Clear the session variable
}

// Check if the form was previously submitted
$formSubmitted = isset($_COOKIE['form_submitted']);
// https://codepen.io/wiljanslofstra/pen/xqOKZW
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
        .hidden {
            display: none;
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

        /* Meme Contest Start */
        .meme-container {
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .vote-button {
            display: inline-block;
            cursor: pointer;
            padding: 8px 16px;
            border: 2px solid #007bff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
            text-align: center;
            padding-left: 0;
            margin-top: 10px;
        }

        .vote-icon {
            margin-right: 5px;
        }

        .vote-count {
            font-size: 14px;
            transition: color 0.3s;
            color: #007bff;
        }

        .vote-button.voted {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .vote-button.voted .vote-count {
            color: #fff;
        }
        .meme-container-ul{
            margin: 0;
            padding: 0;
            list-style-type: none;
            width: 100%;
        }
        .meme-container-ul li{
            width: 32%;
            display: inline-block;
            list-style-type: none;
        }
        /* Meme Contest End */
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
                        <h3><span class="alternate">Meme</span> Contest</h3>
                        <p>19th January - 26th January 2024 (Upto 15:00 hrs)</p>
                        
                    </div>
                    <div>
                    <img src="assets/images/weekly contest.png" alt="" style="width: 100%;">
                    </div>
                </div>
                <hr>
                
            </div>
            <div class="row">
             <div class="col-9">
          
            <!-- Meme 1 -->
            <ul class="meme-container-ul">
                <li >
                    <div class="meme-container">
                        <div class="user-info">
                            <div class="d-flex align-items-center">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1YjmQy7iBycLxXrdwvrl38TG9G_LxSHC1eg&usqp=CAU" class="profile-image" alt="User Profile">
                                <p class="mb-0">User Name 1 <br> <small class="text-muted">Date Time</small></p>
                            </div>
                        </div>
                        <!-- Meme Image -->
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpeaDjrqk0yw1cQqzu8O2lxojglSCND9OjKg&usqp=CAU" class="img-fluid" alt="Meme 1">
                        <!-- Vote Button -->
                        <span class="vote-button" onclick="toggleVote(this)">
                            <i class="fas fa-thumbs-up vote-icon"></i> <span class="vote-count">1k</span> Votes
                        </span>
                    </div>
                </li>
            </ul>

            <!-- Meme 2 -->
            <!-- Similar structure for Meme 2 -->

            <!-- Meme 3 -->
            <!-- Similar structure for Meme 3 -->

                </div>


        <div class="col-3">
            <h4>Provide your details</h4>
            <!-- Display success or error messages -->
            <?php
                if (isset($formMessage)) {
                    echo '<div class="alert ' . ($formMessage['type'] == 'success' ? 'alert-success' : 'alert-danger') . '" role="alert">' . $formMessage['message'] . '</div>';
                }
                ?>
            <!-- Submission Form -->
            <form id="submitForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <!-- Form Fields -->
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" required>
                </div>

                <div class="form-group">
                    <label for="memberId">Member ID</label>
                    <input type="text" class="form-control" id="memberId" name="memberId" required>
                </div>

                <div class="form-group">
                    <label for="actuarialAssociation">Actuarial Association</label>
                    <input type="text" class="form-control" id="actuarialAssociation" name="actuarialAssociation" required>
                </div>

                <div class="form-group">
                    <label for="organization">Organization</label>
                    <input type="text" class="form-control" id="organization" name="organization" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="tel" class="form-control" id="contact" name="contact" required>
                </div>
                <?php if (!$formSubmitted) { ?>
            <!-- ... (other form fields) ... -->

            <!-- Radio Toggle for Meme/Text -->
            <div class="form-group">
                <label>Choose Meme or Text:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="meme_type" id="memeOption" value="meme" checked>
                    <label class="form-check-label" for="memeOption">Meme</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="meme_type" id="textOption" value="text">
                    <label class="form-check-label" for="textOption">Text</label>
                </div>
            </div>

            <!-- Show upload memes/text field based on radio selection -->
            <div class="form-group" id="uploadMemeField">
                <label for="meme">Upload Meme:</label>
                <input type="file" class="form-control-file" name="meme" accept="image/*">
            </div>
            <div class="form-group" id="memeTextField" style="display:none;">
                <label for="meme_text">Meme Text:</label>
                <textarea class="form-control" name="meme_text"></textarea>
            </div>
        <?php } ?>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
        

    </div>
           
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

    <script src="assets/js/weekly-contest-w2.js"></script>
    <script>
    function toggleVote(span) {
        span.classList.toggle('voted');
        const countElement = span.querySelector('.vote-count');
        let count = parseInt(countElement.innerText);

        if (span.classList.contains('voted')) {
            count++;
        } else {
            count--;
        }

        countElement.innerText = count > 0 ? `${count}k` : '0';
    }
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {
        $('input[name="meme_type"]').change(function () {
                if ($(this).val() === 'meme') {
                    $('#uploadMemeField').show();
                    $('#memeTextField').hide();
                } else {
                    $('#uploadMemeField').hide();
                    $('#memeTextField').show();
                }
            });
        // Validate the form using jQuery Validation plugin
        $('#submitForm').validate({
            rules: {
                // Add validation rules as needed
                email: {
                    required: true,
                    email: true
                },
                // ... (other fields)
            },
            messages: {
                // Add custom error messages as needed
                email: {
                    required: 'Please enter a valid email address',
                    email: 'Please enter a valid email address'
                },
                // ... (other fields)
            },
            submitHandler: function (form) {
                // Store form values in cookies
                document.cookie = 'user_full_name=' + encodeURIComponent($('#full_name').val());
                document.cookie = 'user_member_id=' + encodeURIComponent($('#member_id').val());
                document.cookie = 'user_actuarial_association=' + encodeURIComponent($('#actuarial_association').val());
                document.cookie = 'user_organisation=' + encodeURIComponent($('#organisation').val());
                document.cookie = 'user_email=' + encodeURIComponent($('#email').val());
                document.cookie = 'user_contact=' + encodeURIComponent($('#contact').val());

                form.submit();
            }
        });
    });
</script>
  <!-- JavaScript to hide remaining form fields if the form was submitted -->
  <script>
        $(document).ready(function () {
            <?php if ($formSubmitted) { ?>
                // Form was submitted, hide remaining form fields
                $('#submitForm input:not([readonly]), #submitForm textarea:not([readonly]), #submitForm select:not([readonly])').prop('disabled', true);
            <?php } ?>
        });
    </script>
<!-- jQuery for handling vote button clicks with AJAX -->
<script>
    $(document).ready(function () {
        $('.vote-button').each(function () {
            var memeId = $(this).data('meme-id');

            // Use AJAX to check if the user has already voted for this meme
            $.ajax({
                type: 'POST',
                url: 'check_vote.php', // Create a separate PHP file (check_vote.php) to check the vote state
                data: { memeId: memeId },
                success: function (response) {
                    if (response === 'voted') {
                        // Update the vote button state to voted
                        setVotedState(memeId);
                    }
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });

        $('.vote-button').click(function () {
            var memeId = $(this).data('meme-id');

            // Use AJAX to handle voting
            $.ajax({
                type: 'POST',
                url: 'vote.php',
                data: { memeId: memeId },
                success: function (response) {
                    // Update the vote count on success
                    var countElement = $('.vote-button[data-meme-id="' + memeId + '"] .count');
                    var newCount = parseInt(countElement.text());

                    if (response === 'Vote recorded successfully') {
                        // Increment vote count
                        newCount++;
                    } else if (response === 'Vote decremented successfully') {
                        // Decrement vote count
                        newCount--;
                    }

                    countElement.text(newCount);

                    // Update the vote button state
                    setVotedState(memeId);
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });

        function setVotedState(memeId) {
            // Update the vote button state to voted
            $('.vote-button[data-meme-id="' + memeId + '"]').addClass('voted');
        }
    });
</script>

</body>

</html>