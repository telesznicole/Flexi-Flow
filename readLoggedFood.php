<?php
// Include your database connection
include("dbconnection.php");

// Check if both 'user_id' and 'start' parameters are set
if (isset($_GET['user_id']) && isset($_GET['date'])) {
    $user_id = $_GET['user_id'];  // The user ID
    $date = $_GET['date'];  // The date in YYYY-MM-DD HH:MM:SS format

    // Validate the start datetime format (YYYY-MM-DD HH:MM:SS)
    if (DateTime::createFromFormat('Y-m-d H:i:s', $date) === false) {
        die("Invalid start date format. Please use YYYY-MM-DD HH:MM:SS.");
    }

    // Convert the start datetime to just the date (YYYY-MM-DD)
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d'); 

    // Attempt to connect to the database
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // First query: Get the logged recoveries for the given user and date
        // We are using DATE(start) to only match the date portion of the start DATETIME field
        $stmt = $pdo->prepare('SELECT * FROM logged_food WHERE user_id = :user_id AND DATE(date) = :date');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);  // Correct bind for 'date'
        $stmt->execute();
        
        // Fetch the logged foods
        $foods = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($foods) {
            // Loop through the logged recoveries and echo each key-value pair
            foreach ($foods as $food) {
                foreach ($food as $key => $value) {
                    echo $key . ": " . htmlspecialchars($value) . "\n"; // Print the field name and its value
                }

                // Now, for each food_id, retrieve the title from the food table
                $food_id = $food['food_id'];
                $stmt2 = $pdo->prepare('SELECT food_name FROM food WHERE id = :food_id');
                $stmt2->bindParam(':food_id', $food_id, PDO::PARAM_INT);
                $stmt2->execute();
                
                // Fetch the food title
                $food_name = $stmt2->fetch(PDO::FETCH_ASSOC);
                
                if ($food_name) {
                    echo "food_name: " . $food_name['food_name'] . "\n";  // Print the recovery title
                } else {
                    echo "Food title not found.\n";  // If title is not found
                }

                // if ($meal_name)

                echo "\n";  // Add a line break after each recovery record
            }
        } else {
            echo "No foods found for the given user and date.";  // If no recoveries are found
        }
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
} else {
    echo "user_id or date parameter is missing.";  // If parameters are missing
}
?>
