<?php

include "includes/config.php";

$error = false;
$errorMessage = '';
session_start();
// Fetch memes data from 'memes' table
$stmt = $pdo->prepare("SELECT * FROM meme_users where status=1");
$stmt->execute();
$memes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch vote counts for each meme

// Function to generate a unique filename for the uploaded image
function generateUniqueFilename($originalFilename)
{
    $timestamp = time();
    $randomString = bin2hex(random_bytes(8)); // Generate a random string
    $extension = pathinfo($originalFilename, PATHINFO_EXTENSION);
    $newFilename = "meme_" . $timestamp . "_" . $randomString . "." . $extension;
    return $newFilename;
}



// Handle form submission 
if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST["submit"]))) {   
    // Validate and sanitize input (you may need to enhance validation based on your requirements)
    $fullName = filter_input(INPUT_POST, 'full_name');
    $memberId = filter_input(INPUT_POST, 'member_id');
    $actuarialAssociation = $_POST["actuarial_association"];
    $organisation = filter_input(INPUT_POST, 'organisation');
    $email = filter_input(INPUT_POST, 'email');
    $contact = filter_input(INPUT_POST, 'contact');

    // Handle meme upload or text submission $_POST["meme_type"]
    $selectedOption = "meme"; 

    if ($selectedOption == "meme" && $_FILES["meme"]["size"] > 0 && in_array($_FILES["meme"]["type"], ["image/jpeg", "image/png", "image/gif", "image/jpg"])) {
       
        // Handle meme upload (if a file is selected and is an image/gif)
        $targetDir = "uploads/memes/"; // Specify your upload directory
        $originalFilename = $_FILES["meme"]["name"];
        $newFilename = generateUniqueFilename($originalFilename);

        $targetFile = $targetDir . $newFilename;

        // Check image size
        if ($_FILES["meme"]["size"] <= 2097152) { // 2 MB in bytes
            // Move the uploaded file to the target directory
            move_uploaded_file($_FILES["meme"]["tmp_name"], $targetFile);
            // Insert user data into 'users' table using PDO
            $stmt = $pdo->prepare("INSERT INTO meme_users (full_name, member_id, actuarial_association, organisation, email, contact, meme_image_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$fullName, $memberId, $actuarialAssociation, $organisation, $email, $contact, $targetFile]);
            // Set a session message for successful submission
            $_SESSION['form_message'] = ['type' => 'success', 'message' => 'Form submitted successfully!'];

            $userCookie = json_encode([
                'full_name' => $fullName,
                'member_id' => $memberId,
                'actuarial_association' => $actuarialAssociation,
                'organisation' => $organisation,
                'email' => $email,
                'contact' => $contact
            ]);
            setcookie('meme_user_info', $userCookie, time() + (86400 * 30), "/"); // Cookie valid for 30 days

            // Set a cookie to remember that the form has been submitted
            setcookie('form_submitted', true, time() + (86400 * 30), "/"); // 86400 seconds = 1 day

        } else {
            
            // Set a session message for image size exceeded
            $_SESSION['form_message'] = ['type' => 'danger', 'message' => 'Image size should be less than 2MB.'];
        } 
    } else {
        
        // Set a session message for successful submission
        $_SESSION['form_message'] = ['type' => 'success', 'message' => 'Pleae upload meme.'];
    }


    // Redirect to prevent form resubmission on page refresh
    header("Location: ./weekly-contest#meme_div");
}

// Check for success or error message in the session
// if (isset($_SESSION['form_message']) && !empty($_SESSION['form_message'])) {
//     $formMessage = $_SESSION['form_message'];
//     unset($_SESSION['form_message']); // Clear the session variable
// }

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

        section.schedule a {
            color: #007bff !important;
            cursor: pointer;
        }

        form#userForm label {
            color: #000;
        }

        .section-title {
            margin-bottom: 25px;
        }

        span.alternate {
            font-style: normal;
            font-weight: 600;
        }

        .form-control {
            margin-bottom: 0;
            padding: 12px 9px;
        }

        /* Meme Contest Start */
        .error,
        .astric {
            color: red;
        }

        .meme-container {
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
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
            width: 100%;
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

        .meme-container-ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
            width: 100%;
        }

        .meme-container-ul li {
            width: 48%;
            display: inline-block;
            list-style-type: none;
            margin-left: 10px;
            vertical-align: top;
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
                        <h4 style="color: #f02596;"><b>Thrilled! Excited! to attend 23<sup>rd</sup>GCA?
                            <br>Depict it via Meme
    </b></h4>
                        <p>19th January - 27th January 2024 (Upto 15:00 hrs)</p>

                    </div>
                    <div>
                        <img src="assets/images/weekly contest.png" alt="" style="width: 100%;">
                    </div>
                </div>
                <hr>

            </div>
            <div class="row" >
                <div class="col-7">

                    <!-- Meme 1 -->
                    <?php
                    if(!empty($memes)){
                    ?>
                    <ul class="meme-container-ul">
                        <?php
                        $voteCounts = [];
                        foreach ($memes as $meme) {
                        // $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM meme_votes WHERE user_id = ?");
                        // $stmt->execute([$meme['id']]);
                        // $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        // $voteCounts[$meme['id']] = $result['count'];

                            if ($meme['meme_image_url'] != '') {
                        ?>
                                <li>
                                    <div class="meme-container">
                                        <div class="user-info">
                                            <div class="d-flex align-items-center">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1YjmQy7iBycLxXrdwvrl38TG9G_LxSHC1eg&usqp=CAU" class="profile-image" alt="User Profile">
                                                <p class="mb-0"><?= $meme['full_name']; ?> <br> <small class="text-muted"><?= date('d-M-Y', strtotime($meme['created_at'])) ?></small></p>
                                            </div>
                                        </div>
                                        <!-- Meme Image -->
                                        <?php
                                        if (!empty($meme['meme_image_url']) && $meme['meme_image_url'] != null) {
                                        ?>
                                            <img src="<?= $meme['meme_image_url']; ?>" class="img-fluid" alt="Meme 1">
                                        <?php
                                        } else {

                                            echo '<p class="card-text">' . $meme['meme_text'] . '</p>';
                                        }
                                        ?>

                                        <!-- Vote Button with Count -->
                                        <!-- <button class="btn btn-secondary vote-button" data-meme-id="<?php echo $meme['id']; ?>">
                                            <i class="fa fa-thumbs-up"></i>
                                            <span class="count"><?php echo isset($voteCounts[$meme['id']]) ? $voteCounts[$meme['id']] : 0; ?> Vote</span>
                                        </button> -->
                                    </div>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                    <?php
                    }else{
                    ?>
                   <div style="border: 1px dashed #000;height: 250px;text-align: center;display: flex;justify-content: center;align-items: center;">Keep Watching this space.</div>
                    <?php
                    }?>
                </div>


                <div class="col-5" id="meme_div">
                    <div class="card">
                        <div class="card-header">
                            <h6>Step 1: Provide your details</h6>
                        </div>
                        <div class="card-body">
                            <!-- Display success or error messages -->
                            <?php

                            $userCookie = isset($_COOKIE['meme_user_info']) ? json_decode($_COOKIE['meme_user_info'], true) : null;

                            if (isset($_SESSION['form_message'])) {
                                $formMessage = $_SESSION['form_message'];
                                echo '<div class="alert ' . ($formMessage['type'] == 'success' ? 'alert-success' : 'alert-danger') . '" role="alert">' . $formMessage['message'] . '</div>';
                                // unset($_SESSION['form_message']);
                            }
                            ?>
                            <!-- Submission Form -->
                            <form id="submitForm" action="" method="post" enctype="multipart/form-data">
                                <!-- Form Fields -->

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="full_name" class="form-label">Full Name <span class="astric">*</span></label>
                                        <input type="text" class="form-control" id="full_name" name="full_name" required value="<?php echo isset($userCookie['full_name']) ? $userCookie['full_name'] : ''; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="member_id" class="form-label">Member ID </label>
                                        <input type="number" class="form-control" id="member_id" name="member_id" value="<?php echo isset($userCookie['member_id']) ? $userCookie['member_id'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="actuarialAssociation">Actuarial Association</label>

                                        <select class="form-control" id="actuarial_assoc" name="actuarial_association">
                                            <option value="">Select
                                                Association</option>
                                            <option value="Institute of Actuaries of India" <?php echo (isset($userCookie['actuarial_association']) && $userCookie['actuarial_association'] == 'Institute of Actuaries of India') ? 'selected' : ''; ?>>
                                                Institute of Actuaries of India</option>
                                            <option value="Institute & Faculty of Actuaries" <?php echo (isset($userCookie['actuarial_association']) && $userCookie['actuarial_association'] == 'Institute & Faculty of Actuaries') ? 'selected' : ''; ?>>
                                                Institute &amp; Faculty of Actuaries</option>
                                            <option value="Casualty Actuarial Society" <?php echo (isset($userCookie['actuarial_association']) && $userCookie['actuarial_association'] == 'Casualty Actuarial Society') ? 'selected' : ''; ?>>
                                                Casualty Actuarial Society</option>
                                            <option value="Actuarial Society of South Africa" <?php echo (isset($userCookie['actuarial_association']) && $userCookie['actuarial_association'] == 'Actuarial Society of South Africa') ? 'selected' : ''; ?>>
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
                                    <div class="col-md-6">
                                        <label for="organization" class="form-label">Organization <span class="astric">*</span></label>
                                        <input type="text" class="form-control" id="organization" name="organisation" required value="<?php echo isset($userCookie['organisation']) ? $userCookie['organisation'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">

                                        <label for="email" class="form-label">Email <span class="astric">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" required value="<?php echo isset($userCookie['email']) ? $userCookie['email'] : ''; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="contact_no" class="form-label">Contact No <span class="astric">*</span></label>
                                        <input type="number" class="form-control" id="contact_no" name="contact" required value="<?php echo isset($userCookie['contact']) ? $userCookie['contact'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <!-- <div class="col-md-6">
                                        <label>Choose Meme or Text:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="meme_type" id="memeOption" value="meme" checked>
                                            <label class="form-check-label" for="memeOption">Meme</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="meme_type" id="textOption" value="text">
                                            <label class="form-check-label" for="textOption">Text</label>
                                        </div>
                                    </div> -->

                                    <!-- Show upload memes/text field based on radio selection -->
                                    <div class="col-md-12" id="uploadMemeField">
                                        <label for="meme">Upload Meme <span class="astric">*</span></label>
                                        <input type="file" class="form-control-file" id="memeFile" name="meme" accept="image/*" required>
                                        <span class="error">Note: Please only upload image/gif files upto 2mb.</span>
                                    </div>
                                    <!-- <div class="col-md-6" id="memeTextField" style="display:none;">
                                        <label for="meme_text">Meme Text:</label>
                                        <textarea class="form-control" id="memeText" name="meme_text"></textarea>
                                    </div> -->
                                </div>



                                <!-- Submit Button -->
                                <div class="col-md-12 text-center">
                                    <input type="checkbox" name="terms" required>&nbsp;&nbsp;I agree to <a data-toggle="modal" data-target="#weeklyContestModal">&nbsp;terms & conditions</a>.*<br>
                                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script src="assets/js/weekly-contest-w2.js"></script>
  


</body>

</html>