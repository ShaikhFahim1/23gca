<?php
include "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Check-in</title>
     <!-- FAVICON -->
  <link href="assets/images/gca_favicon.png" rel="shortcut icon">

    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
      @import url("https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Roboto:300,400,500,700");

        body {
            font-family: "Montserrat", sans-serif;
            background-color: #f5f5f5;
            /* light grey background */
        }

        #checkin-card {
           background-color: #304fc5;
            border-radius: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            width: 50%;
            margin: 10px auto;
            height: 97vh /* center the card */;
            position: relative;
            overflow:hidden
            }

        #logo-container {
            padding: 20px;
            text-align: center;
            padding-bottom: 0;
        }

        #logo {
       
            border-radius: 10px;
            max-width: 96%;
            height: auto;
        }

        #webcheckin-title {
            text-align: center;
            font-size: 1.7rem;
            color: #ffffff;
            /* padding: 20px; */
            /* background-color: #304fc5; */
            margin: 0;
            height: 92px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card .card-content {
            padding: 24px;
            border-radius: 40px 40px 10px 10px;
            background: white;
            height: 100vh;
        }
        #footer{
          position: absolute;
          bottom: 0;
          width: 100%;
          padding: 10px;
          background: #666;
          color: white;
          border-radius: 0 0 10px 10px;
          text-align:center
        }

        #checkin-form {
            padding: 20px;
        }

        /* Tab Start */

        
        :root {
            --primary-color: #185ee0;
            --secondary-color: #e6eef9;
        }

        .tabs {
            display: flex;
            position: relative;
            background-color: #fff;
            box-shadow: 0 0 1px 0 rgba(24, 94, 224, 0.15), 0 6px 12px 0 rgba(24, 94, 224, 0.15);
            padding: 0;
            border-radius: 99px;
        }

        .tabs * {
            z-index: 2;
        }

        .form-tab-pills input[type=radio] {
            display: none;
        }

        .tab {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 43px;
            line-height:43px;
            width: 50%;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 99px;
            cursor: pointer;
            transition: color 0.15s ease-in;
            color: #222;
        }

        .form-tab-pills input[type=radio]:checked+label {
            color: var(--primary-color);
        }

        .form-tab-pills input[type=radio]:checked+label>.notification {
            background-color: var(--primary-color);
            color: #fff;
        }

        .form-tab-pills input[id=radio-1]:checked~.glider {
            transform: translateX(0);
        }

        .form-tab-pills input[id=radio-2]:checked~.glider {
            transform: translateX(100%);
        }

        .form-tab-pills input[id=radio-3]:checked~.glider {
            transform: translateX(200%);
        }

        .glider {
            position: absolute;
            display: flex;
            height: 43px;
            width: 49.8%;
            background-color: var(--secondary-color);
            z-index: 1;
            border-radius: 99px;
            transition: 0.25s ease-out;
        }

        /* @media (max-width: 700px) {
            .tabs {
                transform: scale(0.6);
            }
        } */
        @media screen and (max-width: 768px) {
            #checkin-card {
                width: 100%; /* set width to 100% for smaller screens */
            }
            .tab{
                width: 100%;
            }
            #webcheckin-title{
              font-size:1.5rem
            }
        }
        .tabs{
            height: 43px;
            width: 100%;
        }
         /* Styling for tab content */
            .tab-content {
            display: none;
            margin-top: 15px;
            }

            #tab-content-1 {
            display: block;
            }
        /* Tab End */
                /* Slider to unlock start */
     .slideToUnlock {   
    position:relative;
    text-align: center;
    height: 50px;
    line-height: 50px;
    border-radius: 25px;  
    }

.progressBar {
    position: absolute;
    left:0;
    top:0;
    width: 0;
    height: 100%; 
    border-radius: 25px;
   } 
   .text {
    position: absolute;
    left:0;
    top:0;
    width: 100%;
    height: 100%; 
    border-radius: 25px;
    background-color:transparent;
    -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
     -khtml-user-select: none; /* Konqueror HTML */
       -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome and Opera */
   } 

    .drag {
        position: absolute;
        width:50px;
        height: 50px;
        left:0%;
        display: inline-block;
        line-height: 50px;
        border-radius: 25px;
        cursor: pointer;
        border: 1px solid #cccccc;
        background: #fff;
        color: #692003;  
        text-align: center;
    }
    /* Iphone green theme start */

    .locked {
        color: #692003;
        font-size: 18px;
          
        background-color: #CCC;  
    }

    .locked_handle{
        background-image: url("assets/images/right_arrow.png");  
    }  

    .unlocked {
    background-color:rgb(8, 252, 20);
    }
    .unlocked_handle{
        background-image: url("assets/images/left_arrow.png");   
    }  
    /* Iphone green theme end */
    div.row {
            margin: 10px;
        }

      .green.unlock {
        background: rgb(8, 122, 252);
      }
      .icon {
        position: absolute;
    top: 16px;
    right: 50%;
    transform: translateX(50%);
    width: 64px;
    height: 64px;
    fill: green;
  }

      #successMessage {
      display: none;
      background-color: #dff0d8;
    border-color: #d0e9c6;
    color: #3c763d;
    padding: 92px 15px 15px 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    position: relative;
    text-align: center;
    border-radius: 40px 40px 10px 10px;
    height: 73vh;
    }
    #successMessage p{
      font-size: 20px;
    margin-top: 4px;
    font-weight: 600;
    }
                /* Slide to unlock end */
    </style>
</head>

<body>
    <div class="container">
        <div id="checkin-card" class="card">
            <div id="logo-container">
                <img id="logo" src="assets/images/biglogo.png" alt="Event Logo" height="100">
            </div>
            <h2 id="webcheckin-title"><b><?= $webtitle ?>
              </b></h2>
            <div class="card-content " id="commonForm">
                    <?php
                    if (WEBCHECKINDAY != "3") {
                      ?>
                <div class="tabs form-tab-pills">
                    <input type="radio" id="radio-1" name="tabs" checked />
                    <label class="tab" for="radio-1">Member</label>
                    
                    <input type="radio" id="radio-2" name="tabs" />
                    <label class="tab" for="radio-2">NON Member</label>
                    
                    <span class="glider"></span>
                </div>
                <?php } ?>

                
                  <div id="tab-content-1" class="tab-content">
                    <form id="memberCheckinForm">

                        <div class="row">
                          <div class="input-field col s12">
                            <input id="memberId" type="number" class="validate">
                            <label for="memberId">Enter Member ID</label>
                          </div>
                          <div class="col s12 center-align">
                              <button class="waves-effect waves-light btn" type="submit"><?= $memberButton ?></button>
                         <!-- <div id="slider1" data-lock-text="Swipe to check-in" data-unlock-text="Checked-in" class="col-sm-5"> 
                            </div> -->
                        </div> 
                        </div>
                        
                        

                      </form>
                  </div>
                
                  <div id="tab-content-2" class="tab-content">
                    <form id="nonMemberCheckinForm">

                        <div class="row">
                          <div class="input-field col s12 m6">
                            <input id="name" type="text" class="validate">
                            <label for="name">Name</label>
                          </div>
                          <div class="input-field col s12 m6">
                            <input id="email" type="email" class="validate">
                            <label for="email">Email</label>
                          </div>
                          <div class="col s12  center-align">
                        <button class="waves-effect waves-light btn" type="submit">Check In</button>
                        <!--    <div id="slider2" data-lock-text="Swipe to check-in" data-unlock-text="Checked-in" class="col-sm-5"> </div> -->
                          </div>
                        </div>
                        
                         
                      </form>
                  </div>
                
             
        

            </div>
            <div id="successMessage">

          </div>
              <div id="footer"> 
        <div class="container">
          <div class="copyright">
            © Copyright GCA. All Rights Reserved.
          </div>
    
        </div>
                    
      </div>
        </div>
    </div>

    <!-- Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <!-- SweetAlert JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="assets/js/jquery.slideToUnlock.js"></script>  
    <script>
            $(document).ready(function(){
            $("#slider1").slideToUnlock({ useData: true, theme: "grey", member:true});
            $("#slider2").slideToUnlock({ useData: true, theme: "grey", nonmember:true});
            })
            
        </script> -->

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
        '<p>Congratulations, ' + name.toUpperCase() + '! 🎉 <?= $localStoragetext ?></p>' +
        '</div>';
      document.getElementById('successMessage').style.display = 'flex';
      document.getElementById('commonForm').remove();
      localStorage.setItem("<?= $localStorage ?>", true); // Store in localStorage
    }
    // Check if success message is stored in localStorage
    var checkinSuccess = localStorage.getItem("<?= $localStorage ?>");
      if (checkinSuccess) {      
      var name = localStorage.getItem('username');
      showSuccessMessage(name);
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
  // Ask for confirmation before proceeding
  swal({
        title: "Confirm Check-in",
        text: "Are you sure you want to check in?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willCheckIn) => {
        if (willCheckIn) {
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
                  localStorage.setItem('username', response.name); // Store in localStorage
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
        }
    });
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
// Ask for confirmation before proceeding
  swal({
        title: "Confirm Check-in",
        text: "Are you sure you want to check in?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willCheckIn) => {
      if(willCheckIn){
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
              localStorage.setItem('username', response.name); // Store in localStorage
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
        }
    });
  });
  </script>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Materialize components
            M.AutoInit();

            // Form submit event
            document.getElementById('checkin-form').addEventListener('submit', function (event) {
                event.preventDefault();
                // You can add your form submission logic here
                // For example, you can collect form data and send it to a server
            });
        });
    </script>
    <!-- JavaScript to handle tab switching -->
    <script>
    const tabs = document.querySelectorAll('.tab');
    const glider = document.querySelector('.glider');

    tabs.forEach((tab, index) => {
      tab.addEventListener('click', () => {
        const width = tab.offsetWidth;
        const left = tab.offsetLeft;
        glider.style.transform = `translateX(${left}px)`;

        // Toggle the visibility of the corresponding content
        const contentId = `tab-content-${index + 1}`;
        const content = document.getElementById(contentId);
        document.querySelectorAll('.tab-content').forEach(c => c.style.display = 'none');
        content.style.display = 'block';
      });
    });
  </script>
</body>

</html>