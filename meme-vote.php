<?php

include "includes/config.php";
 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["memeId"]) &&  isset($_POST['give_vote']) && $_POST['give_vote']=='true') {
    // Assuming you have a PDO database connection
    
    $memeId = $_POST["memeId"];
    $userIp = $_SERVER['REMOTE_ADDR']; // Use IP address for simplicity (not secure)

    // Check if the user has already voted for this meme
    $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM meme_votes WHERE user_id = ? AND user_ip = ?");
    $stmt->execute([$memeId, $userIp]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] == 0) {
        // User has not voted for this meme, proceed with voting
        $stmt = $pdo->prepare("INSERT INTO meme_votes (user_id, user_ip) VALUES (?, ?)");
        $stmt->execute([$memeId, $userIp]);

        echo 'Vote recorded successfully';
    } else {
        // User has already voted for this meme, decrement the vote
        $stmt = $pdo->prepare("DELETE FROM meme_votes WHERE user_id = ? AND user_ip = ?");
        $stmt->execute([$memeId, $userIp]);

        echo 'Vote decremented successfully';
    }
} 

 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["memeId"]) &&  isset($_POST['check_vote']) && $_POST['check_vote']=='true' ) {
     
    $memeId = $_POST["memeId"];
    $userIp = $_SERVER['REMOTE_ADDR']; // Use IP address for simplicity (not secure)

    // Check if the user has already voted for this meme
    $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM meme_votes WHERE user_id = ? AND user_ip = ?");
    $stmt->execute([$memeId, $userIp]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] > 0) {
        // User has already voted for this meme
        echo 'voted';
    } else {
        echo 'not voted';
    }
} 


?>
