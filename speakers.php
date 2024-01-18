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

$result = $conn->query("SELECT * FROM speakers where type='VIP' and status = 1 order by order_number");
$result2 = $conn->query("SELECT * FROM speakers where type='NON VIP' and status = 1 order by name asc");

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
						<h3>Speakers</h3>
					</div>
					<ol class="breadcrumb justify-content-center p-0 m-0">
						<li class="breadcrumb-item"><a href="index">Home</a></li>
						<li class="breadcrumb-item active">Speakers</li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<!--====  End of Page Title  ====-->


	<!--==============================
=            Speakers            =
===============================-->

	<section class="section speakers white">
		<div class="container">

			<div class="row" style="justify-content:center;border-bottom: 1px solid #922dd4;margin-bottom: 20px;">
				<?php
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						// Use the URL-friendly version to construct the URL
						$speaker_url = $row['url_slug'];
						$speaker_name = $row['name'];
						$salutation = $row['salutation'];
						$speaker_image = $row['profile_image'];
						$designation = $row['designation'];
				?>				
				<div class="col-lg-3 col-md-4 col-sm-6">
					<!-- Speaker 1 -->
					<div class="speaker-item">
						<div class="image">
							<img src="uploads/speakers/<?= $speaker_image ?>" alt="speaker" class="speak-img-fluid">
						</div>
						<div class="content text-center">
							<h5><a href="speaker-details?url_slug=<?= $speaker_url ?>"><?= $salutation ?>. <?= $speaker_name ?></a></h5>
							<p><?= $designation ?></p>
							<a class="btn btn-register btn-main-md" href="speaker-details?url_slug=<?= $speaker_url ?>" >View Profile</a>
						</div>
					</div>
				</div>
				<?php
					}
				} else {
					echo "0 results";
				}
				?>
				
			</div>
			<div class="row">
			<?php
				if ($result2->num_rows > 0) {
					while ($row2 = $result2->fetch_assoc()) {
						// Use the URL-friendly version to construct the URL
						$speaker_url = $row2['url_slug'];
						$speaker_name = $row2['name'];
						$salutation = $row2['salutation'];
						$speaker_image = $row2['profile_image'];
						$designation = $row2['designation'];
				?>				
				<div class="col-lg-3 col-md-4 col-sm-6">
					<!-- Speaker 1 -->
					<div class="speaker-item">
						<div class="image">
							<img src="uploads/speakers/<?= $speaker_image ?>" alt="speaker" class="speak-img-fluid">
						</div>
						<div class="content text-center">
						<h5><a href="speaker-details?url_slug=<?= $speaker_url ?>"><?= $salutation ?>. <?= $speaker_name ?></a></h5>
							<p><?= $designation ?></p>
							<a class="btn btn-register btn-main-md" href="speaker-details?url_slug=<?= $speaker_url ?>" target="_blank">View Profile</a>
						</div>
					</div>
				</div>
				<?php
					}
				} else {
					echo "0 results";
				}
				?>
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