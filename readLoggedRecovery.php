<?php
// Include your database connection
include("dbconnection.php");

// Check if both 'user_id' and 'start' parameters are set
if (isset($_GET['user_id']) && isset($_GET['start'])) {
    $user_id = $_GET['user_id'];  // The user ID
    $start = $_GET['start'];  // The start in YYYY-MM-DD HH:MM:SS format

    // Validate the start datetime format (YYYY-MM-DD HH:MM:SS)
    if (DateTime::createFromFormat('Y-m-d H:i:s', $start) === false) {
        die("Invalid start date format. Please use YYYY-MM-DD HH:MM:SS.");
    }

    // Convert the start datetime to just the date (YYYY-MM-DD)
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $start)->format('Y-m-d'); 

    // Attempt to connect to the database
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // First query: Get the logged recoveries for the given user and date
        // We are using DATE(start) to only match the date portion of the start DATETIME field
        $stmt = $pdo->prepare('SELECT * FROM logged_recovery WHERE user_id = :user_id AND DATE(start) = :date');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);  // Correct bind for 'date'
        $stmt->execute();
        
        // Fetch the logged recoveries
        $recoveries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($recoveries) {
            // Loop through the logged recoveries and echo each key-value pair
            foreach ($recoveries as $recovery) {
                foreach ($recovery as $key => $value) {
                    echo $key . ": " . htmlspecialchars($value) . "\n"; // Print the field name and its value
                }

                // Now, for each recovery_id, retrieve the title from the recovery table
                $recovery_id = $recovery['recovery_id'];
                $stmt2 = $pdo->prepare('SELECT title FROM recovery WHERE id = :recovery_id');
                $stmt2->bindParam(':recovery_id', $recovery_id, PDO::PARAM_INT);
                $stmt2->execute();
                
                // Fetch the recovery title
                $title = $stmt2->fetch(PDO::FETCH_ASSOC);
                
                if ($title) {
                    echo "Recovery Title: " . $title['title'] . "\n";  // Print the recovery title
                } else {
                    echo "Recovery title not found.\n";  // If title is not found
                }

                echo "\n";  // Add a line break after each recovery record
            }
        } else {
            echo "No recoveries found for the given user and date.";  // If no recoveries are found
        }
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
} else {
    echo "user_id or start parameter is missing.";  // If parameters are missing
}
?>
