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

function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

if (isset($_POST['submit'])) {
    $salutation = isset($_POST['salutation']) ? mysqli_real_escape_string($conn, $_POST['salutation']) : "";
    $speaker_name = isset($_POST['speaker_name']) ? mysqli_real_escape_string($conn, $_POST['speaker_name']) : "";
    $designation = isset($_POST['designation']) ? mysqli_real_escape_string($conn, $_POST['designation']) : "";
    $bio = isset($_POST['bio']) ? mysqli_real_escape_string($conn, $_POST['bio']) : ""; // Escape special characters
    $linkedin = isset($_POST['linkedin']) ? mysqli_real_escape_string($conn, $_POST['linkedin']) : ""; // Escape special characters
    $type = $_POST['type'];
    $url_slug = slugify($speaker_name);
    // File upload handling
    $target_dir = "uploads/speakers/";
    if(isset($_FILES["profile_image"]) && $_FILES["profile_image"] !=''){
        $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
        // Check if image file is a actual image or fake image
       
            $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
            if ($check !== false) {
              //   echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        
    
        // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }
  
        // Check file size
        if ($_FILES["profile_image"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }else{
              // Allow only certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }else{
              // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                    $profile_image_path = basename($_FILES["profile_image"]["name"]);
                //   echo "The file " . htmlspecialchars(basename($_FILES["profile_image"]["name"])) . " has been uploaded.";


                        
                    // Use prepared statement to prevent SQL injection
                    $stmt = $conn->prepare("INSERT INTO speakers (salutation, name, designation, bio, linkedin, profile_image, type, url_slug) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssssss", $salutation, $speaker_name, $designation, $bio, $linkedin, $profile_image_path, $type, $url_slug);

                    if ($stmt->execute()) {
                        echo "Record added successfully";
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    $stmt->close();

                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        }
    
      
    
      
    
       
    }
      
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    if (isset($_GET['id']) && $_GET['action'] && $_GET['action'] == "edit")  {
        $speaker_id = $_GET['id'];
        // Fetch the speaker profile from the database
        $sql = "SELECT * FROM speakers WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $speaker_id);
    
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
    }else{
        $row = [];
    }
    
    $salutation = isset($_POST['salutation']) ? mysqli_real_escape_string($conn, $_POST['salutation']) : "";
    $speaker_name = isset($_POST['speaker_name']) ? mysqli_real_escape_string($conn, $_POST['speaker_name']) : "";
    $designation = isset($_POST['designation']) ? mysqli_real_escape_string($conn, $_POST['designation']) : "";
    $bio = isset($_POST['bio']) ? mysqli_real_escape_string($conn, $_POST['bio']) : ""; // Escape special characters
    $linkedin = isset($_POST['linkedin']) ? mysqli_real_escape_string($conn, $_POST['linkedin']) : ""; // Escape special characters
    $type = $_POST['type'];
    $url_slug = slugify($speaker_name);
    // File upload handling
    $target_dir = "uploads/speakers/";
    if(isset($_FILES["profile_image"]) && $_FILES["profile_image"]["error"] == 0 && !empty($_FILES["profile_image"]["name"])){
      
        $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
        // Check if image file is a actual image or fake image
       
            $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
            if ($check !== false) {
              //   echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        
    
        // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }
  
        // Check file size
        if ($_FILES["profile_image"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }else{
              // Allow only certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }else{
              // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                    $profile_image_path = basename($_FILES["profile_image"]["name"]);
                    if(file_exists('uploads/speakers/'.$row['profile_image'])){
                        unlink('uploads/speakers/'.$row['profile_image']);
                    }
                    $sql = "UPDATE speakers
                            SET salutation = ?, name = ?, designation = ?, bio = ?, linkedin = ?,  profile_image = ?, type = ?, url_slug = ?
                            WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssssssi", $salutation, $speaker_name, $designation, $bio, $linkedin, $profile_image_path, $type, $url_slug,$id);

                    if ($stmt->execute()) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    $stmt->close();

                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
    
       
    }else{
        $sql = "UPDATE speakers
        SET salutation = ?, name = ?, designation = ?, bio = ?, linkedin = ?, type = ?, url_slug = ?
        WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssi", $salutation, $speaker_name, $designation, $bio, $linkedin, $type, $url_slug,$id);

if ($stmt->execute()) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
    }
      
}
if (isset($_GET['id']) && $_GET['action'] && $_GET['action'] == "delete")  {
    $speaker_id = $_GET['id'];
    // Fetch the speaker profile from the database
    $sql = "DELETE FROM speakers WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $speaker_id);
    if ($stmt->execute()) {
        echo "Speaker profile deleted successfully.";
    } else {
        echo "Error deleting speaker profile: " . $stmt->error;
    }
}else{
    $row = [];
}

if (isset($_GET['id']) && $_GET['action'] && $_GET['action'] == "edit")  {
    $speaker_id = $_GET['id'];
    // Fetch the speaker profile from the database
    $sql = "SELECT * FROM speakers WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $speaker_id);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}else{
    $row = [];
}

$fetch_result = $conn->query("SELECT * FROM speakers where status=1");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speaker Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
    <!-- CKEditor script -->
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <style>
        body {
            padding-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="center-align">Speaker Form</h2>
        <form id="speakerForm" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" >
        <div class="form-group">
            <label for="salutation">Salutation</label>
            <select class="form-control" id="salutation" name="salutation" required>
                <option value="" disabled selected>Select Salutation</option>
                <option value="Shri" <?php echo (isset($row['salutation']) && $row['salutation']  === 'Shri') ? 'selected' : ''; ?>>Shri</option>
                <option value="Dr" <?php echo (isset($row['salutation']) && $row['salutation'] === 'Dr') ? 'selected' : ''; ?>>Dr</option>
                <option value="Mr" <?php echo (isset($row['salutation']) && $row['salutation'] === 'Mr') ? 'selected' : ''; ?>>Mr</option>
                <option value="Ms" <?php echo (isset($row['salutation']) && $row['salutation'] === 'Ms') ? 'selected' : ''; ?>>Ms</option>
                <option value="Mrs" <?php echo (isset($row['salutation']) && $row['salutation'] === 'Mrs') ? 'selected' : ''; ?>>Mrs</option>
                <option value="Commander" <?php echo (isset($row['salutation']) && $row['salutation'] === 'Commander') ? 'selected' : ''; ?>>Commander</option>
            </select>
        </div>
        <div class="form-group">
            <label for="speaker_name">Speaker Name</label>
            <input type="text" class="form-control" id="speaker_name" name="speaker_name" value="<?= isset($row['name']) ? $row['name']:"" ?>" required>
        </div>
        <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" class="form-control" id="designation" name="designation"  value="<?= isset($row['designation']) ? $row['designation']:"" ?>" required>
            <span style="color:red">Note: To add new line use this tag &lt;br&gt; only.</span>
        </div>
        <!-- Bio CKEditor -->
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio"><?= isset($row['bio']) ? str_replace('\r\n','',$row['bio']):"" ?></textarea>
        </div>
        <div class="form-group">
            <label for="linkedin">LinkedIn</label>
            <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?= isset($row['linkedin']) ? $row['linkedin']:"" ?>">
        </div>
        <div class="form-group">
            <label for="profile_image">Profile Image</label>
            <input type="file" class="form-control-file" id="profile_image" name="profile_image" accept="image/*" >
            <span style="color:red">Note: Image height should be <b>255px</b> only.</span>
            <?php
            if(isset($row['profile_image']) && $row['profile_image'] !=''){
                $speaker_image = $row['profile_image'];
                echo '<img src="uploads/speakers/'.$speaker_image.' " alt="" style="width:30%;">';
            }
            ?>
        </div> 
        
        <div class="form-group">
            <label for="profile_image">Speaker Type</label>
            <select name="type" id="" class="form-control w-10">
            <option value="NON VIP" <?php echo (isset($row['type']) && $row['type'] === 'NON VIP') ? 'selected' : ''; ?>>NON VIP</option>
            <option value="VIP" <?php echo (isset($row['type']) && $row['type'] === 'VIP') ? 'selected' : ''; ?>>VIP</option>
            </select>
        </div> 
        
           <?php
           if(isset($_GET['id'])){
           ?>
            <button id="submitBtn" class="btn btn-success" type="submit" name="update">
                <span class="button-text">Update</span>
                <div class="progress" style="display: none;">
                    <div class="indeterminate"></div>
                </div>
            </button>
            <a id="submitBtn" class="btn btn-primary" href="./add-speaker" name="update">
                <span class="button-text">Go back to Add form</span>
                <div class="progress" style="display: none;">
                    <div class="indeterminate"></div>
                </div>
           </a>
           <?php
           }else{
           ?>
            <button id="submitBtn" class="btn btn-success" type="submit" name="submit">
                <span class="button-text">Submit</span>
                <div class="progress" style="display: none;">
                    <div class="indeterminate"></div>
                </div>
            </button>
           <?php
           }
           ?>
        </form>
        <br>
    <div class="">
    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>Salutation</th>
                <th>Name</th>
                <th>Designation</th>
            
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($fetch_result->num_rows > 0) {
                while ($row = $fetch_result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['salutation'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['designation'] . "</td>";
    
                //    echo "<td>" . $row['linkedin'] . "</td>";
                    echo '<td>
                    <a href="add-speaker?id=' . $row['id'] . '&action=edit" class="btn btn-primary">Edit</a>
                    <a onclick="return confirm(\'Are you sure you want to delete the ' . $row['name'] . ' data?\');" href="add-speaker?id=' . $row['id'] . '&action=delete" class="btn btn-danger">Delete</a>
                      </td>';
                      echo "</tr>";
            
                }
            } else {
                echo "<tr><td colspan='6'>No speakers found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
   
    </div>
   <!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- CKEditor initialization -->
<script>
    CKEDITOR.replace('bio');
</script>
    
    <script>
        function validateForm() {
            var constraints = {
                speaker_name: {
                    presence: true
                },
                designation: {
                    presence: true
                },
                bio: {
                    presence: true
                },
                linkedin: {
                    presence: false
                },
                profile_image: {
                    presence: true,
                    file: {
                        extension: ['jpg', 'jpeg', 'png', 'gif'],
                        type: 'image/*'
                    }
                }
            };

            var formData = {
                speaker_name: $('#speaker_name').val(),
                designation: $('#designation').val(),
                bio: $('#bio').val(),
                linkedin: $('#linkedin').val(),
                profile_image: $('#profile_image').val()
            };

            var errors = validate(formData, constraints);

            if (errors) {
                alert(Object.values(errors).flat().join('\n'));
                return false;
            }
             // Display loading spinner
             var submitBtn = $('#submitBtn');
            submitBtn.find('.button-text').hide();
            submitBtn.find('.progress').show();

            // Simulate loading progress (0 to 100)
            var progress = 0;
            var interval = setInterval(function() {
                progress++;
                if (progress >= 100) {
                    clearInterval(interval);
                    // Form submission is complete; you can redirect or perform additional actions here
                }
            }, 50);

            return true;

        }
    </script>

</body>
</html>