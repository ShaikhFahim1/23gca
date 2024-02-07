<?php

include "includes/config.php";

$error = false;
$errorMessage = '';
session_start();
setcookie('meme_user_info', '', time() - 3600, '/'); // empty value and old timestamp
session_destroy();

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
            height: 290px;
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
        .user-image{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 75%;
                }
                .img-fluid {
            max-width: 100%;
            max-height: 202px;
        }
        @media only screen and (max-width: 767px) {
        .meme-container-ul li {
            width: 100%;
            margin-left: 0;
        }
            
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
                <div class="col-md-6 offset-md-3 col-sm-12 mb-4" >
                    <div class="section-title">
                    <!-- <h3><span class="alternate">Fun & </span>Actuaries</h3> -->
                        <br><h4 style="color: #f02596;"><b>Thank you all for participating in the weekly contests!<br>

See you all at 23<sup>rd</sup> GCA !
</b></h4>
<a class="btn btn-register btn-main-md" href="./index">Go to home page</a>
                        <!-- <p>27th January - 02nd February 2024 (Upto 15:00 hrs)</p> -->

                    </div>
                    <!-- <div>
                        <img src="assets/images/weekly contest.png" alt="" style="width: 100%;">
                    </div> -->
                </div>
                <hr>

            </div>
            <!-- <div class="row" >
                <div class="col-md-12">

                   <div style="border: 1px dashed #000;height: 250px;text-align: center;display: flex;justify-content: center;align-items: center;">Keep Watching this space.</div>
                   
                </div>

            </div> -->

        </div>
    </section>

    <!--====  End of Speakers  ====-->


    <?php
 
    include "includes/footer.php";
    include "includes/footer_includes.php";
    ?>


</body>

</html>