<?php
// Include your database connection
include("dbconnection.php");

// Check if both 'user_id' and 'date' parameters are set
if (isset($_GET['user_id']) && isset($_GET['date'])) {
    $user_id = $_GET['user_id'];
    $date = $_GET['date'];  // The date in YYYY-MM-DD format

    // Validate the date format (YYYY-MM-DD)
    if (DateTime::createFromFormat('Y-m-d', $date) === false) {
        die("Invalid date format. Please use YYYY-MM-DD.");
    }

    // Attempt to connect to the database
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // First query: Get the logged workouts for the given user and date
        $stmt = $pdo->prepare('SELECT * FROM logged_workouts WHERE user_id = :user_id AND DATE(date) = :date');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->execute();
        
        // Fetch the logged workouts
        $workouts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($workouts) {
            // Loop through the logged workouts and echo each key-value pair
            foreach ($workouts as $workout) {
                foreach ($workout as $key => $value) {
                    echo $key . ": " . $value . "\n"; // Print the field name and its value
                }

                // Now, for each workout_id, retrieve the title from the workouts table
                $workout_id = $workout['workout_id'];
                $stmt2 = $pdo->prepare('SELECT title FROM workouts WHERE id = :workout_id');
                $stmt2->bindParam(':workout_id', $workout_id, PDO::PARAM_INT);
                $stmt2->execute();
                
                // Fetch the workout title
                $title = $stmt2->fetch(PDO::FETCH_ASSOC);
                
                if ($title) {
                    echo "Workout Title: " . $title['title'] . "\n";  // Print the workout title
                } else {
                    echo "Workout title not found.\n";  // If title is not found
                }

                echo "\n";  // Add a line break after each workout record
            }
        } else {
            echo "No workouts found for the given user and date.";  // If no workouts are found
        }
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
} else {
    echo "userId or date parameter is missing.";  // If parameters are missing
}
?>
