<?php
include "includes/config.php";

$currentDateTime = date('Y-m-d H:i:s');
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Decode the JSON data sent with the request
    $data = json_decode(file_get_contents("php://input"));

    // Validate input data
    if (isset($data->memberId)) {
        // Member check-in
        $memberId = $data->memberId;
         // Validate memberId (only accept numbers)
        if (!is_numeric($memberId)) {
            $response = array(
                'success' => false,
                'message' => 'Member ID must be a number.'
            );
            echo json_encode($response);
            exit;
        }
        
        // // Replace YOUR_CHECKIN_LATITUDE and YOUR_CHECKIN_LONGITUDE with actual check-in location coordinates
        // $checkinLocation = array('latitude' => YOUR_CHECKIN_LATITUDE, 'longitude' => YOUR_CHECKIN_LONGITUDE); 

        // // Replace with actual user's location received from the front-end
        // $userLocation = array('latitude' => $data->latitude, 'longitude' => $data->longitude);

        // // Calculate distance between user's location and check-in location
        // $distance = calculateDistance($checkinLocation, $userLocation);

        // // Check if user is within 900 meter radius of check-in location
        // if ($distance > RADIUS_DISTANCE) {
        //     echo json_encode(array("success" => false, "message" => "You are not within the check-in location."));
        //     exit;
        // }
        try {
           
            // Prepare SQL statement to check if member exists in tbl_registration
            $stmt = $pdo->prepare("SELECT * FROM tbl_registration WHERE member_id = ?");
            $stmt->execute([$memberId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        
            if ($row) {
                $username = $row['name'];    
                // Member exists in tbl_registration, check if already checked in
                $stmt = $pdo->prepare("SELECT * FROM $checkInTable WHERE member_id = ?");
                $stmt->execute([$memberId]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    // Member is already checked in
                   // echo json_encode(array("success" => false, "message" => "You are already checked in."));
                    echo json_encode(array("success" => true,"name"=>$username));
                } else {
                    // Insert the record into $checkInTable table
                  
                    $stmt = $pdo->prepare("INSERT INTO $checkInTable (member_id, checkin_date) VALUES (?, ?)");
                    $stmt->execute([$memberId,$currentDateTime]);
                    // Check-in successful
                    echo json_encode(array("success" => true,"name"=>$username));
                }
            } else {
                // Member ID not found in tbl_registration
                echo json_encode(array("success" => false, "message" => "Member ID not found."));
            }
        } catch(PDOException $e) {
            // Error occurred
            echo json_encode(array("success" => false, "message" => "Error: " . $e->getMessage()));
        }

        // Close the database connection
        $pdo = null;
    } elseif (isset($data->name) && isset($data->email)) {
        // Non-member check-in
        $name = $data->name;
        $email = $data->email;

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(array("success" => false, "message" => "Invalid email format."));
            exit;
        }

        
        // // Replace YOUR_CHECKIN_LATITUDE and YOUR_CHECKIN_LONGITUDE with actual check-in location coordinates
        // $checkinLocation = array('latitude' => YOUR_CHECKIN_LATITUDE, 'longitude' => YOUR_CHECKIN_LONGITUDE); 

        // // Replace with actual user's location received from the front-end
        // $userLocation = array('latitude' => $data->latitude, 'longitude' => $data->longitude);

        // // Calculate distance between user's location and check-in location
        // $distance = calculateDistance($checkinLocation, $userLocation);

        // // Check if user is within 900 meter radius of check-in location
        // if ($distance > RADIUS_DISTANCE) {
        //     echo json_encode(array("success" => false, "message" => "You are not within the check-in location."));
        //     exit;
        // }

        try {
            $stmt = $pdo->prepare("SELECT * FROM $checkInTable WHERE email = ?");
                $stmt->execute([$email]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    // Member is already checked in
                    echo json_encode(array("success" => false, "message" => "You are already checked in."));
                } else {
            // Insert the record into $checkInTable table
            $stmt = $pdo->prepare("INSERT INTO $checkInTable (name, email, checkin_date) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email,$currentDateTime]);
            // Check-in successful
            echo json_encode(array("success" => true,"name"=>$name));

                }


        } catch(PDOException $e) {
            // Error occurred
            echo json_encode(array("success" => false, "message" => "Error: " . $e->getMessage()));
        }

        // Close the database connection
        $pdo = null;
    } else {
        // Invalid request data
        echo json_encode(array("success" => false, "message" => "Invalid request data."));
    }
} else {
    // Invalid request method
    echo json_encode(array("success" => false, "message" => "Invalid request method."));
}

// Function to calculate distance between two locations
function calculateDistance($location1, $location2) {
    $R = 6371e3; // Earth radius in meters
    $φ1 = toRadians($location1['latitude']);
    $φ2 = toRadians($location2['latitude']);
    $Δφ = toRadians($location2['latitude'] - $location1['latitude']);
    $Δλ = toRadians($location2['longitude'] - $location1['longitude']);

    $a = sin($Δφ / 2) * sin($Δφ / 2) +
            cos($φ1) * cos($φ2) *
            sin($Δλ / 2) * sin($Δλ / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    return $R * $c;
}

// Function to convert degrees to radians
function toRadians($degrees) {
    return $degrees * pi() / 180;
}
// Function to retrieve name from database based on member ID
function getUsernameFromDatabase($memberId,$pdo) {
    $stmt = $pdo->prepare('SELECT name FROM tbl_registration WHERE member_id = ?');
    $stmt->execute([$memberId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        return $row['name'];
    } else {
        return false;
    }
}
?>
