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
  </style>
</head>
<body>
  
  <div class="container">
    <h1 class="center-align">Web Check-in</h1>
    <!-- Pill selection -->
    <div class="row">
      <div class="col s12">
        <div class="row">
          <div class="col s4">
            <a id="agfaBtn" class="waves-effect waves-light btn" onclick="showForm('agfa')">Agfa - 12th Feb</a>
          </div>
          <div class="col s4">
            <a id="gca1Btn" class="waves-effect waves-light btn disabled" onclick="showForm('gca1')">GCA - 13th Feb</a>
          </div>
          <div class="col s4" >
            <a id="gca2Btn" class="waves-effect waves-light btn disabled" onclick="showForm('gca2')">GCA - 14th Feb</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Common form -->
    <div id="commonForm">
      <h2 class="center-align">Common Form</h2>

      <div class="row">
        <div class="col s12">
          <div class="radio-inline">
            <label class="checked" onclick="toggleForm('memberForm', this)">
              <input name="memberType" type="radio" value="member" checked="checked" />
              <span>Member</span>
            </label>
          </div>
          <div class="radio-inline">
            <label onclick="toggleForm('nonMemberForm', this)">
              <input name="memberType" type="radio" value="nonMember" />
              <span>Non Member</span>
            </label>
          </div>
            <!-- Common border -->
            <div id="commonBorder"></div>
        </div>
      </div>

      <!-- Member form -->
      <div id="memberForm">
        <div class="row">
          <div class="input-field col s12">
            <input id="memberId" type="text" class="validate">
            <label for="memberId">Enter Member ID</label>
          </div>
        </div>
        <a class="waves-effect waves-light btn" onclick="checkIn()">Check In</a>
      </div>

      <!-- Non-Member form -->
      <div id="nonMemberForm" style="display: none;">
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
        <a class="waves-effect waves-light btn" onclick="checkIn()">Check In</a>
      </div>
    </div>
  </div>

  <!-- Materialize JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <script>

    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems);
      // Show the member form by default
      toggleForm('memberForm', document.querySelector('label.checked'));
    });

    function showForm(pill) {
      // Reset form
      document.getElementById('memberForm').style.display = 'none';
      document.getElementById('nonMemberForm').style.display = 'none';

      // Enable only the selected button
      document.getElementById('agfaBtn').classList.remove('disabled');
      document.getElementById('gca1Btn').classList.remove('disabled');
      document.getElementById('gca2Btn').classList.remove('disabled');

      // Disable other buttons and highlight the selected one
      document.getElementById('agfaBtn').classList.add(pill === 'agfa' ? 'blue' : 'disabled');
      document.getElementById('gca1Btn').classList.add(pill === 'gca1' ? 'blue' : 'disabled');
      document.getElementById('gca2Btn').classList.add(pill === 'gca2' ? 'blue' : 'disabled');

      // Show respective form based on selected pill
      if (pill === 'agfa' || pill === 'gca1' || pill === 'gca2') {
        document.getElementById('commonForm').style.display = 'block';
      }

      if (pill === 'agfa') {
        // Handle Agfa form
      } else if (pill === 'gca1' || pill === 'gca2') {
        // Handle GCA form
      }
    }

    function toggleForm(formId, label) {
      // Hide all forms first
      document.getElementById('memberForm').style.display = 'none';
      document.getElementById('nonMemberForm').style.display = 'none';

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

    function checkIn() {

    }
  </script>
</body>
</html>
