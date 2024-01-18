<?php

include "includes/config.php";
  
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["memeId"]) && isset($_POST["status"])) {

    $memeId = $_POST["memeId"];
    $status = $_POST["status"];

    // Update meme status in the 'memes' table
    $stmt = $pdo->prepare("UPDATE memes SET status = ? WHERE meme_id = ?");
    $stmt->execute([$status, $memeId]);

    echo 'Meme status updated successfully';
} else {
    echo 'Invalid request';
} 

// Fetch user-submitted memes with pending status
$stmt = $pdo->prepare("SELECT meme_id, user_id, meme_image_url, meme_text FROM memes WHERE status = 'pending'");
$stmt->execute();
$memes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add any additional styles or scripts you need -->
</head>

<body>

    <div class="container mt-5">
        <h2>User-Submitted Memes</h2>

        <?php
        // Display user-submitted memes in a loop
        foreach ($memes as $meme) {
        ?>
            <div class="card mb-3">
                <div class="card-body">
                    <!-- User Profile Image, Name, Date/Time -->
                    <!-- You can add these details based on your database structure -->

                    <!-- Meme Image or Text -->
                    <?php
                    if (!empty($meme['meme_image_url'])) {
                        echo '<img src="' . $meme['meme_image_url'] . '" class="img-fluid" alt="Meme Image">';
                    } elseif (!empty($meme['meme_text'])) {
                        echo '<p class="card-text">' . $meme['meme_text'] . '</p>';
                    }
                    ?>

                    <!-- Accept and Reject Buttons -->
                    <div class="mt-3">
                        <button class="btn btn-success accept-button" data-meme-id="<?php echo $meme['meme_id']; ?>">
                            <i class="fas fa-check"></i> Accept
                        </button>
                        <button class="btn btn-danger reject-button" data-meme-id="<?php echo $meme['meme_id']; ?>">
                            <i class="fas fa-times"></i> Reject
                        </button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <!-- Add any additional HTML content or scripts you need -->

    </div>

    <!-- Bootstrap and additional scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Your custom scripts here -->

    <!-- jQuery for handling accept/reject button clicks with AJAX -->
    <script>
        $(document).ready(function () {
            $('.accept-button, .reject-button').click(function () {
                var memeId = $(this).data('meme-id');
                var status = $(this).hasClass('accept-button') ? 'accepted' : 'rejected';

                // Use AJAX to handle accept/reject
                $.ajax({
                    type: 'POST',
                    url: 'update_status.php', // Create a separate PHP file (update_status.php) to update the meme status
                    data: { memeId: memeId, status: status },
                    success: function (response) {
                        // Handle success response, e.g., remove the card or update UI
                        console.log(response);
                    },
                    error: function (error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
</body>

</html>
