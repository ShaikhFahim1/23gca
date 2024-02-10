<?php
include "includes/config.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>AGFA Web Check In</title>


  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Event and Conference Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Eventre HTML Template v1.0">

  <!-- theme meta -->
  <meta name="theme-name" content="GCA" />
  <!-- PLUGINS CSS STYLE -->
  <!-- Bootstrap -->
  <link href="assets/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
  
  
  <!-- CUSTOM CSS -->
  <link href="assets/css/style.css?version=4" rel="stylesheet">
  <link href="assets/css/custom.css?version=4" rel="stylesheet">

  <!-- Responsive CSS -->

  <!-- FAVICON -->
  <link href="assets/images/gca_favicon.png" rel="shortcut icon">


  <style>
    .about .content-block {
      margin: 15px 0 !important;
    }

    /* Custom CSS */
    .radio-inline {
      display: inline-block;
      margin-right: 20px;
      position: relative;
    }

    .radio-inline label {
      border: none;
      /* Remove existing border */
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 20px;
      transition: all 0.3s ease;
      background-color: transparent;
    }

    .radio-inline label.checked {
      color: #2196F3;
    }

    /* Common border */
    #commonBorder {
      position: absolute;
      top: 50.5%;
      left: 0;
      transform: translateY(-50%);
      width: 155px;
      height: 39px;
      border: 2px solid #2196F3;
      border-radius: 20px;
      transition: all 0.3s ease;
    }
  </style>
</head>

<body class="body-wrapper">


  <!--========================================
=            Navigation Section            =
=========================================-->
  <nav class="navbar main-nav fixed-top navbar-expand-lg p-0">
    <div class="container-fluid p-0">
      <!-- logo -->
      <a class="navbar-brand" href="index" style="padding: 5px 33px;">
        <img src="assets/images/gca-logo.png" alt="logo" style="width: 100%;">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span>
      </button>
      </div>
    </div>
  </nav>
  <section class="page-title bg-title overlay-dark">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <div class="title">
            <h3>Web Check-in</h3>
          </div>
          <ol class="breadcrumb justify-content-center p-0 m-0">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item active">Web Check in</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!--===========================
=            About            =
============================-->

  <section id="venue" class="wow fadeInUp">

    <div class="container-fluid">

      <div class="row no-gutters">
        <!-- Pill selection -->
        <div class="row">
          <div class="col s12">
            <div class="row">
              <div class="col s4">
                <a id="agfaBtn" class="waves-effect waves-light btn">Agfa - 12th Feb</a>
              </div>
              <div class="col s4">
                <a id="gca1Btn" class="waves-effect waves-light btn disabled">GCA - 13th Feb</a>
              </div>
              <div class="col s4">
                <a id="gca2Btn" class="waves-effect waves-light btn disabled">GCA - 14th Feb</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Common form -->
        <div id="commonForm">

          <div class="row">
            <div class="col s12">
              <div class="radio-inline">
                <label class="checked" onclick="toggleForm('memberDiv', this)">
                  <input name="memberType" type="radio" value="member" checked="checked" />
                  <span>Member</span>
                </label>
              </div>
              <div class="radio-inline">
                <label onclick="toggleForm('nonMemberDiv', this)">
                  <input name="memberType" type="radio" value="nonMember" />
                  <span>Non Member</span>
                </label>
              </div>
              <!-- Common border -->
              <div id="commonBorder"></div>
            </div>
          </div>

          <!-- Member form -->
          <div id="memberDiv">
            <form id="memberCheckinForm">

              <div class="row">
                <div class="input-field col s12">
                  <input id="memberId" type="number" class="validate">
                  <label for="memberId">Enter Member ID</label>
                </div>
              </div>
              <button class="waves-effect waves-light btn" type="submit">Check In</button>
            </form>
          </div>

          <!-- Non-Member form -->
          <div id="nonMemberDiv" style="display: none;">
            <form id="nonMemberCheckinForm">

              <div class="row">
                <div class="input-field col s6">
                  <input id="name" type="text" class="validate">
                  <label for="name">Name</label>
                </div>
                <div class="input-field col s6">
                  <input id="email" type="email" class="validate">
                  <label for="email">Email</label>
                </div>
              </div>
              <button class="waves-effect waves-light btn" type="submit">Check In</button>
            </form>
          </div>
        </div>
        <div id="successMessage">

        </div>
      </div>
    </div>
  </section>


  <footer id="footer">
    
    <div class="container">
      <div class="copyright">
        © Copyright GCA. All Rights Reserved.
      </div>

    </div>
  </footer>





  <!-- JAVASCRIPTS -->
  <!-- jQuey -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
 
  


  <!-- SweetAlert JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      }
    }

    function showPosition(position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;
      //  alert("Latitude: " + latitude + "\nLongitude: " + longitude);
    }

    // Call getLocation initially
    getLocation();

    function showSuccessMessage(name) {
      document.getElementById('successMessage').innerHTML = '<div class="success-message">' +
        '<svg class="icon" viewBox="0 0 24 24">' +
        '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15l-4-4 1.41-1.41L11 14.17l6.59-6.59L19 9l-8 8z"></path>' +
        '</svg>' +
        '<p>Congratulations, ' + name + '! 🎉 You\'ve successfully checked in to the 23rd GCA Happy Event!</p>' +
        '</div>';
      document.getElementById('successMessage').style.display = 'flex';
      document.getElementById('commonForm').style.display = 'none';
      localStorage.setItem('checkinSuccess', true); // Store in localStorage



    }
    // Check if success message is stored in localStorage
    var checkinSuccess = localStorage.getItem('checkinSuccess');
    if (checkinSuccess) {
      document.getElementById('successMessage').style.display = 'flex';
      document.getElementById('commonForm').style.display = 'none';
    }
  </script>
  <script>
    document.getElementById('memberCheckinForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent default form submission

      // Get form data
      var memberId = document.getElementById('memberId').value;

      // Validate member ID
      if (!memberId.trim()) {
        // Show error message if member ID is empty
        swal("Please enter a member ID.", "", "info");
        return;
      }

      // Send AJAX request for member check-in
      var xhr = new XMLHttpRequest();
      xhr.open('POST', './process_checkin', true);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
              // Show success message
              swal("Check-in successful!", "", "success");
              showSuccessMessage(response.name);
            } else {
              // Show error message
              swal(response.message, "", "info");
            }
          } else {
            // Show error message
            swal("An error occurred while processing your request.", "", "info");
          }
        }
      };
      xhr.send(JSON.stringify({
        memberId: memberId
      }));
    });

    document.getElementById('nonMemberCheckinForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent default form submission

      // Get form data
      var name = document.getElementById('name').value;
      var email = document.getElementById('email').value;

      // Validate name and email
      if (!name.trim() || !email.trim()) {
        // Show error message if name or email is empty
        swal("Please enter your name and email.", "", "info");
        return;
      }

      // Send AJAX request for non-member check-in
      var xhr = new XMLHttpRequest();
      xhr.open('POST', './process_checkin', true);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
              // Show success message
              swal("Check-in successful!", "", "success");
              showSuccessMessage(name.trim());
            } else {
              // Show error message
              swal(response.message, "", "info");
            }
          } else {
            // Show error message
            swal("An error occurred while processing your request.", "", "info");
          }
        }
      };
      xhr.send(JSON.stringify({
        name: name,
        email: email
      }));
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems);
      // Show the member form by default
      toggleForm('memberDiv', document.querySelector('label.checked'));
    });

    function toggleForm(formId, label) {
      // Hide all forms first
      document.getElementById('memberDiv').style.display = 'none';
      document.getElementById('nonMemberDiv').style.display = 'none';

      // Show the selected form
      document.getElementById(formId).style.display = 'block';

      // Toggle checked class for labels
      document.querySelectorAll('.radio-inline label').forEach(function(el) {
        el.classList.remove('checked');
      });
      label.classList.add('checked');

      // Move common border
      var commonBorder = document.getElementById('commonBorder');
      commonBorder.style.left = label.parentElement.offsetLeft + 'px';
    }
  </script>

</body>

</html>