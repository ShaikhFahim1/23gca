<?php
include "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Check-in</title>
  <!-- Materialize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style>
    /* Custom CSS */
    .radio-inline {
      display: inline-block;
      margin-right: 20px;
      position: relative;
    }

    .radio-inline label {
      border: none; /* Remove existing border */
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
    .row .col.s12{
      position: relative;
    }

    #loadingOverlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    #loadingText {
      color: white;
    }
    #successMessage {
      display: none;
      background-color: #dff0d8;
      border-color: #d0e9c6;
      color: #3c763d;
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid transparent;
      border-radius: 4px;
    }
  </style>

  <!-- SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
</head>
<body>
  <div id="loadingOverlay">
    <p id="loadingText">Loading...</p>
  </div>
  <div id="successMessage">
    <p>Check-in successful!</p>
  </div>

  <div class="container">
    <h2 class="center-align">23<sup>rd</sup> GCA Web Check-In</h2>
    <!-- Pill selection -->
    <div class="row">
      <div class="col s12">
        <div class="row">
          <div class="col s4">
            <a id="agfaBtn" class="waves-effect waves-light btn" >Agfa - 12th Feb</a>
          </div>
          <div class="col s4">
            <a id="gca1Btn" class="waves-effect waves-light btn disabled" >GCA - 13th Feb</a>
          </div>
          <div class="col s4" >
            <a id="gca2Btn" class="waves-effect waves-light btn disabled" >GCA - 14th Feb</a>
          </div>
        </div>
      </div>
    </div>
    <!-- <div id="locationPrompt">
    <p>This website requires your location to proceed. Please enable location services.</p>
    <button onclick="getLocation()">Enable Location</button>
    </div> -->

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
            <input id="memberId" type="text" class="validate">
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
  </div>

  <!-- SweetAlert JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script>
    
    // Function to show the success message
    function showSuccessMessage() {
      document.getElementById('successMessage').style.display = 'block';
      localStorage.setItem('checkinSuccess', true); // Store in localStorage
    }

    // Check if success message is stored in localStorage
    var checkinSuccess = localStorage.getItem('checkinSuccess');
    if (checkinSuccess) {
      document.getElementById('successMessage').style.display = 'block';
    }

    // Function to handle location error
    function handleLocationError(error) {
      switch (error.code) {
        case error.PERMISSION_DENIED:
          swal("Error", "You have denied the request for location. Please allow location access to continue.", "error")
            .then((value) => {
              getLocation(); // Prompt again for location
            });
          break;
        case error.POSITION_UNAVAILABLE:
          swal("Error", "Location information is unavailable.", "error");
          break;
        case error.TIMEOUT:
          swal("Error", "The request to get user location timed out.", "error");
          break;
        case error.UNKNOWN_ERROR:
          swal("Error", "An unknown error occurred.", "error");
          break;
      }
    }

    // Function to handle successful retrieval of location
    function showFormOrError(position) {
    //  console.log(position.coords.latitude);
    //  console.log(position.coords.longitude);
      // Check if user is within 30 meter radius of check-in location
      var checkinLocation = { latitude: <?= YOUR_CHECKIN_LATITUDE ?>, longitude: <?= YOUR_CHECKIN_LONGITUDE ?> }; // Replace with actual check-in location
      var userLocation = { latitude: position.coords.latitude, longitude: position.coords.longitude };
      var distance = calculateDistance(checkinLocation, userLocation);

      // console.log(distance);
      if (distance <= <?= RADIUS_DISTANCE ?>) {
        // User is within 30 meters, proceed with check-in
      //  showSuccessMessage();
        // Hide all member-related form elements here
       // document.getElementById('checkinForm').style.display = 'none';
      } else {
        // User is not within 30 meters, show error message and prompt again
        swal("Error", "You are not within the check-in location. Please enable location services and allow access to continue.", "error")
          .then((value) => {
            reload(); // Prompt again for location
          });
      }
    }

    // Function to calculate distance between two locations
    function calculateDistance(location1, location2) {
      var R = 6371e3; // Earth radius in meters
      var φ1 = toRadians(location1.latitude);
      var φ2 = toRadians(location2.latitude);
      var Δφ = toRadians(location2.latitude - location1.latitude);
      var Δλ = toRadians(location2.longitude - location1.longitude);

      var a = Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
              Math.cos(φ1) * Math.cos(φ2) *
              Math.sin(Δλ / 2) * Math.sin(Δλ / 2);
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

      return R * c;
    }

    // Function to convert degrees to radians
    function toRadians(degrees) {
      return degrees * Math.PI / 180;
    }

   // Get user location
   function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showFormOrError, handleLocationError);
      } else {
        // Geolocation is not supported
        swal("Error", "Geolocation is not supported by your browser.", "error");
      }
    }

    // Call getLocation initially
    getLocation();
  </script>
  <script>
    document.getElementById('memberCheckinForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent default form submission

      // Get form data
      var memberId = document.getElementById('memberId').value;

      // Validate member ID
      if (!memberId.trim()) {
        // Show error message if member ID is empty
        swal("Error", "Please enter a member ID.", "error");
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
              swal("Success", "Member check-in successful!", "success");
            } else {
              // Show error message
              swal("Error", response.message, "error");
            }
          } else {
            // Show error message
            swal("Error", "An error occurred while processing your request.", "error");
          }
        }
      };
      xhr.send(JSON.stringify({ memberId: memberId }));
    });

    document.getElementById('nonMemberCheckinForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent default form submission

      // Get form data
      var name = document.getElementById('name').value;
      var email = document.getElementById('email').value;

      // Validate name and email
      if (!name.trim() || !email.trim()) {
        // Show error message if name or email is empty
        swal("Error", "Please enter your name and email.", "error");
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
              swal("Success", "Non-member check-in successful!", "success");
            } else {
              // Show error message
              swal("Error", response.message, "error");
            }
          } else {
            // Show error message
            swal("Error", "An error occurred while processing your request.", "error");
          }
        }
      };
      xhr.send(JSON.stringify({ name: name, email: email }));
    });
  </script>
  <!-- Materialize JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

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
      document.querySelectorAll('.radio-inline label').forEach(function (el) {
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
