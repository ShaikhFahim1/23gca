<?php

include "includes/config.php";
 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["memeId"])) {
    // Assuming you have a PDO database connection
    
    $memeId = $_POST["memeId"];
    $userIp = $_SERVER['REMOTE_ADDR']; // Use IP address for simplicity (not secure)

    // Check if the user has already voted for this meme
    $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM votes WHERE meme_id = ? AND user_ip = ?");
    $stmt->execute([$memeId, $userIp]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] == 0) {
        // User has not voted for this meme, proceed with voting
        $stmt = $pdo->prepare("INSERT INTO votes (meme_id, user_ip) VALUES (?, ?)");
        $stmt->execute([$memeId, $userIp]);

        echo 'Vote recorded successfully';
    } else {
        // User has already voted for this meme, decrement the vote
        $stmt = $pdo->prepare("DELETE FROM votes WHERE meme_id = ? AND user_ip = ?");
        $stmt->execute([$memeId, $userIp]);

        echo 'Vote decremented successfully';
    }
} else {
    echo 'Invalid request';
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["memeId"])) {
     
    $memeId = $_POST["memeId"];
    $userIp = $_SERVER['REMOTE_ADDR']; // Use IP address for simplicity (not secure)

    // Check if the user has already voted for this meme
    $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM votes WHERE meme_id = ? AND user_ip = ?");
    $stmt->execute([$memeId, $userIp]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] > 0) {
        // User has already voted for this meme
        echo 'voted';
    } else {
        echo 'not voted';
    }
} else {
    echo 'Invalid request';
}


?>

?>
