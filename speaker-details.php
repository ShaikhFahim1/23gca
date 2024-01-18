<?php

// $host = "localhost";
// $dbname = "23gca";
// $username = "root";
// $password = "";

$host = "68.178.155.150";
$dbname = "23gca";
$username = "Fahim";
$password = "Fahim@123";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming the URL slug is passed as a parameter in the URL
if (isset($_GET['url_slug'])) {
    $url_slug = $_GET['url_slug'];

    // Using prepared statement to prevent SQL injection
    $sql = "SELECT * FROM speakers WHERE url_slug = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $url_slug);

    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $speaker_image = $row['profile_image'];
    } else {
        header('location:./speakers');
       }
   
} else {
    echo "Invalid URL";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Speakers - 23rd GCA</title>

	<?php
	include "includes/header_includes.php";
	?>
	<style>
		.speakers .speaker-item{
			height: auto;
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

	<section class="page-title bg-title overlay-dark">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<div class="title">
						<h3>Speaker Details</h3>
					</div>
					<ol class="breadcrumb justify-content-center p-0 m-0">
						<li class="breadcrumb-item"><a href="index">Home</a></li>
						<li class="breadcrumb-item ">Speaker Details</li>
                        <li class="breadcrumb-item active"><?= $row['name'];  ?></li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<!--====  End of Page Title  ====-->


	<!--==============================
=            Speakers            =
===============================-->

<section class="section single-speaker">
	<div class="container">
		<div class="block">
			<div class="row">
                <?php
                
                    ?>
                    <div class="col-lg-3 col-md-6">
					<div class="image-block">
						<img src="uploads/speakers/<?= $speaker_image ?>" class="img-fluid" alt="speaker">
					</div>
				</div>
				<div class="col-lg-9 col-md-6 align-self-center">
					<div class="content-block">
						<div class="name">
							<h3><b><?= $row['name']; ?></b></h3>
						</div>
						<div class="profession">
							<p><?= $row['designation']; ?></p>
						</div>
						<div class="details">
                            <?php
                            echo str_replace('\r\n','',$row['bio']);
                            ?>
						</div>
						<?php
                        if(isset($row['linkedin']) && $row['linkedin']!=''){                        
                        ?>
                        <div class="social-profiles">
							<h5>Social Profiles</h5>
							<ul class="list-inline social-list">
								<li class="list-inline-item">
									<a href="<?= $row['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
								</li>
							</ul>
						</div>
                        <?php
                        }
                        ?>
					</div>
				</div>
                <?php
                    
                    
               
                ?>
				
			</div>
		</div>
	
	</div>
</section>

	<!--====  End of Speakers  ====-->


	<?php
	$conn->close();
	include "includes/footer.php";
	include "includes/footer_includes.php";
	?>


</body>

</html>