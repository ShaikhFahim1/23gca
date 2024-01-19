<?php

include "includes/config.php";
  
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["meme_id"]) && isset($_POST["status"])) {

    $memeId = $_POST["meme_id"];
    $status = $_POST["status"];

    // Update meme status in the 'memes' table
    $stmt = $pdo->prepare("UPDATE meme_users SET status = ? WHERE id = ?");
    $stmt->execute([$status, $memeId]);

    echo 'Meme status updated successfully';
} 


// Fetch user-submitted memes with pending status
$stmt = $pdo->prepare("SELECT * FROM meme_users WHERE status = '0'");
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
            width: 31%;
            display: inline-block;
            list-style-type: none;
            margin-left: 10px;
        }

        /* Meme Contest End */
    </style>

</head>

<body>

    <div class="container mt-5">
        <h2>User-Submitted Memes</h2>

        <ul class="meme-container-ul">
                        <?php
                        $voteCounts = [];
                        if(!empty($memes)){

                    
                        foreach ($memes as $meme) {
                            // $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM meme_votes WHERE user_id = ?");
                            // $stmt->execute([$meme['id']]);
                            // $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            // $voteCounts[$meme['id']] = $result['count'];

                            if ($meme['meme_image_url'] != '') {
                        ?>
                                <li>
                                    <form action="" method="post">
                                    <div class="meme-container">
                                        <div class="user-info">
                                            <div class="d-flex align-items-center">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1YjmQy7iBycLxXrdwvrl38TG9G_LxSHC1eg&usqp=CAU" class="profile-image" alt="User Profile">
                                                <p class="mb-0"><?= $meme['full_name']; ?> <br> <small class="text-muted"><?= date('d-M-Y', strtotime($meme['created_at'])) ?></small></p>
                                            </div>
                                        </div>
                                        <!-- Meme Image -->
                                        <?php
                                        if (!empty($meme['meme_image_url']) && $meme['meme_image_url'] != null) {
                                        ?>
                                            <img src="<?= $meme['meme_image_url']; ?>" class="img-fluid" alt="Meme 1">
                                        <?php
                                        } else {

                                            echo '<p class="card-text">' . $meme['meme_text'] . '</p>';
                                        }
                                        echo '<input type="hidden" name="meme_id" value="'.$meme['id'].'">';
                                        ?>
                                        <div>
                                            <select name="status" class="form-control">
                                                <option value="">Select</option>
                                                <option value="1">Accept</option>
                                                <option value="2">Reject</option>
                                            </select>
                                        </div>
                                        

                                        <!-- Vote Button with Count -->
                                        <button class="btn btn-secondary vote-button" type="submit" name="submit">
                                            Submit
                                        </button>
                                    </div>
                                    </form>
                                </li>
                        <?php
                                    }
                                }
                        }else{
                            echo '<br><br><br><h3>Currently there are no memes available.</h3>';
                        }
                        ?>
                    </ul>
                    

    </div>

    <!-- Bootstrap and additional scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Your custom scripts here -->
    
</body>

</html>
